<?php
	session_start();
	if(isset($_SESSION["login"]) && ($_SESSION["pass"])) {
		$email = $_SESSION['email'];
	}

	include('connect.php');
	include('select.php');
	include('setting.php');

	function random_probability($probabilities) {
		$random = mt_rand(1, 100); 
		$item = array();
		foreach($probabilities as $id => $percentage) {
			if ($percentage > $random) {
				array_push($item, $id);
			}
		}
		return $item[array_rand($item, 1)];
	}

	if(isset($_POST['cmd']) && $_POST['cmd'] == 'checkrandom' ) {
		$conn = connectDb();
		$str = "SELECT GamePoints FROM UsersData WHERE CustomerID = ".$customer."";
		$array = sqlsrv_fetch_array(sqlsrv_query( $conn, $str), SQLSRV_FETCH_ASSOC);
		$itemarr = array();
		foreach ($item_rand_array as $key => $value) {
		  array_push($itemarr, $key);
		}

		if($array['GamePoints'] > $item_rand_eachtime) {
			echo json_encode($itemarr);
		} else {
			echo "RANDOM:NOPOINTS";
		}
		exit();
	} else if(isset($_POST['cmd']) && $_POST['cmd'] == 'getitemrandom' ) {
		$error = false;
		$conn = connectDb();
		$getitem = random_probability($item_rand_array);
		$str = "SELECT GamePoints FROM UsersData WHERE CustomerID = ".$customer."";
		$array = sqlsrv_fetch_array(sqlsrv_query( $conn, $str), SQLSRV_FETCH_ASSOC);
		//$insertLog = sqlsrv_query($conn,"INSERT INTO PN_RandomItemLog (CustomerID, ItemID) VALUES ('".$_SESSION['customerid']."', '".$getitem."') ");
	
		if($array) {
			if($getitem > 0) {
				$updatepoints = sqlsrv_query($conn,"UPDATE UsersData SET GamePoints -= ".$item_rand_eachtime." WHERE CustomerID = ".$customer." ");
				
				$sql = "{call FN_AddFullItemToUser(?, ?, ?, ?, ?, ?)}";
				$params = array( array($customer, SQLSRV_PARAM_IN), array($getitem, SQLSRV_PARAM_IN), array(1, SQLSRV_PARAM_IN), array(-1, SQLSRV_PARAM_IN), array(-1, SQLSRV_PARAM_IN), array(10000, SQLSRV_PARAM_IN) );
				$additem = sqlsrv_query( $conn, $sql, $params);
				
				if($updatepoints && $additem) {
					$insertitem = true;
				} else {
					$insertitem = false;
				}
			} else {
				$insertitem = true;
			}
		} else {
			$insertitem = false;
		}
		
		if(!$insertitem) {
			$error = true;
			$massage = die( print_r( sqlsrv_errors(), true));
		}
		
		if(!$error) {
			$output = array(
				'getitem'=>$getitem,
				'lastgc'=>($array['GamePoints'] -= $item_rand_eachtime)
			);
		} else {
			$output = array(
				'error' => array(
					'message' => $massage
				)
			);
		}
		echo json_encode($output);
		exit();
	}
?>