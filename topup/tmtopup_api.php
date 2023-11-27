<?php 
	require "../config/connect.php";
	require "../config/setting.php";
	require "../pages/line.php";
	session_start();
	ini_set('display_errors','On');
	error_reporting(E_ALL |E_STRICT);
	date_default_timezone_set("Asia/Bangkok");
	$conn = connectDb();
	if ( $conn === false) {
		echo "Error in connection.\n";
		die( print_r( sqlsrv_errors(),true));
	}
	
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else {
		$ip = $_SERVER["REMOTE_ADDR"];
	}

	require_once('AES.php');
	define('API_PASSKEY',$APIPASSKEY);
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}

	if($_SERVER['REMOTE_ADDR'] == '203.146.127.115'&&isset($_GET['request']))
	{
		$aes = new Crypt_AES();
		$aes->setKey(API_PASSKEY);
		$_GET['request'] = base64_decode(strtr($_GET['request'],'-_,','+/='));
		$_GET['request'] = $aes->decrypt($_GET['request']);
		if($_GET['request'] != false) {
			parse_str($_GET['request'],$request);
			$request['Ref1'] = base64_decode($request['Ref1']);
			$request['Ref2'] = base64_decode($request['Ref2']);
			$game_email = trim($request['Ref1']);
			$finduid = "SELECT Accounts.email, Accounts.CustomerID, UsersData.CustomerID, UsersData.GamePoints FROM Accounts,UsersData WHERE UsersData.CustomerID = Accounts.CustomerID AND Accounts.email = ? ";
			$params = array($game_email);
			$queryuid = sqlsrv_query($conn,$finduid,$params);
			$result = sqlsrv_fetch_array($queryuid,SQLSRV_FETCH_ASSOC);
			if($result){$game_uid = $result['CustomerID'];
				$topup_status = $game_uid;
			} else {
				$topup_status = "NO UID";
			}
			
			line_alert($game_email, $request['cardcard_amount']);
			if(base64_decode($request['Ref3']) == 1) {
				if($request['cardcard_amount']==50) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',1,50,'".$request['cashcard_password']."'");
				} elseif($request['cardcard_amount']==90) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',2,90,'".$request['cashcard_password']."'");
				} elseif($request['cardcard_amount']==150) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',3,150,'".$request['cashcard_password']."'");
				} elseif($request['cardcard_amount']==300) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',4,300,'".$request['cashcard_password']."'");
				} elseif($request['cardcard_amount']==500) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',5,500,'".$request['cashcard_password']."'");
				} elseif($request['cardcard_amount']==1000) {
					sqlsrv_query($conn,"EXEC ZJJ_TOPUP'".$request['Ref1']."',6,1000,'".$request['cashcard_password']."'");
				}
				echo 'SUCCEED | เติมเงินเรียบร้อย';
			}

			if(base64_decode($request['Ref3']) == 2) {
				if($request['cardcard_amount']==50)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',1,50,'".$request['cashcard_password']."'");
				}
				elseif($request['cardcard_amount']==90)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',2,90,'".$request['cashcard_password']."'");
				}
				elseif($request['cardcard_amount']==150)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',3,150,'".$request['cashcard_password']."'");
				}
				elseif($request['cardcard_amount']==300)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',4,300,'".$request['cashcard_password']."'");
				}
				elseif($request['cardcard_amount']==500)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',5,500,'".$request['cashcard_password']."'");
				}
				elseif($request['cardcard_amount']==1000)
				{
				sqlsrv_query($conn,"EXEC ZJJ_CHAR'".$request['Ref1']."',6,1000,'".$request['cashcard_password']."'");
				}
				echo 'SUCCEED | เช่าตัวละครเรียบร้อย';
			}
			
			if(base64_decode($request['Ref3']) == 3) {
				$sql = sqlsrv_query($conn,"EXEC FN_RentStar'".$request['Ref2']."','".$_CONFIG['STAR'][$request['cardcard_amount']]."'");
				if(!$sql) {
					echo 'ERROR|'.$request['Ref2'].'|'.$request['cardcard_amount'];
				} else {
					echo 'SUCCEED | User: '.$request['Ref2'].' เช่าดาวจำนวน '.$_CONFIG['STAR'][$request['cardcard_amount']].'วัน เรียบร้อยแล้ว...';
				}
			}
		}else{
			echo 'ERROR|INVALID_PASSKEY';
		}
	} else {
		echo 'ERROR|ACCESS_DENIED';
	};
?>