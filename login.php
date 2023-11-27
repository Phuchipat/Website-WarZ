<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  include("config/connect.php");
  include("config/setting.php");
  $login = (isset($_POST['login']) ?$_POST['login']:null);
  $pass = (isset($_POST['pass']) ?$_POST['pass']:null);

  if(!$login or !$pass) {
    js_alert('กรุณากรอกข้อมูลให้หมด!','error');
    exit();
  }

  $conn = connectDb();
  for($i=0;$i<count($buyitem);$i++) {
    $ii = $i+1;
    $qry = "SELECT * FROM ZJJ_HISTOR_BUYITEM WHERE id = $ii ";
    $params = array();
	$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$stmt = sqlsrv_query($conn, $qry, $params, $options);
    if (sqlsrv_num_rows($stmt) == 1) {
      $qrydb = "UPDATE ZJJ_HISTOR_BUYITEM SET ItemID = '".intval($buyitem[$ii]["itemid"])."', max_store = '".intval($buyitem[$ii]["storeamount"])."' WHERE id = $ii";
    } else {
      $qrydb = "INSERT INTO ZJJ_HISTOR_BUYITEM VALUES ('".$ii."', '".intval($buyitem[$ii]["itemid"])."', 0, '".intval($buyitem[$ii]["storeamount"])."')";
    }
    sqlsrv_query($conn, $qrydb);
  }


  $query = "SELECT [Accountstatus],[CustomerID],[MD5Password] FROM [$WarZDB].[dbo].[Accounts] WHERE [email] = ?;";
  $query = sqlsrv_query($conn,$query,array($login));
  $result = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC);

  if(!$result) {
    js_alert('Email ไม่ถูกต้อง!','error');
    exit();
  }

  if($login_md5) {
    $pass = md5($login_key.$pass);
  }

  if($result['MD5Password'] !== $pass){
    js_alert('Password ไม่ถูกต้อง!','error');
    exit();
  }

  $_SESSION['email'] = $login;
  $_SESSION['login'] = $login;
  $_SESSION['pass'] = $pass;
  $_SESSION['nome'] = $result['Accountstatus'];
  js_alert('เข้าสู่ระบบสำเร็จ','success');
?>
