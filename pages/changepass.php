<?php 
	echo '﻿';
	session_start();
	if(isset($_SESSION["login"]) &&isset($_SESSION["pass"])){
		$login = $_SESSION['login'];$pass = $_SESSION['pass'];$nome = $_SESSION['nome'];$email = $_SESSION['email'];}
	else{
	;echo '<script>
			window.alert("คุณยังไม่ได้เข้าสู่ระบบ!");
			window.location=\'index.php\';
		</script>
	';};
	echo '';
	include "pages/menu.php";
	;echo '<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li><span class="fa fa-bullhorn"></span> ประกาศ : </li> ';echo $New ;echo '            </ol>
			</div>
		</div>
	</div>
	<div class="container">
		<!--login form-->
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-chevron-right"
								aria-hidden="true"></span>';echo $server ;;echo ' (';echo $login ;;echo ')</h3>
					</div>
					<div class="panel-body">
			';if (empty($_POST['atual'])) {;echo '		          
					 <div class="col-md-6 col-md-offset-3">
					   <h3 class="text-center"> Change Password (เปลี่ยนรหัสผ่าน)</h3>
						<form action="" method="post" name="mudasenha" id="mudasenha">						
							<div class="form-group">
							<label for="exampleInputEmail1">พาสเวิร์ดเก่า </label>
							<input name="atual" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control"  id="atual2" maxlength="30">
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail1">พาสเวิร์ดใหม่ </label>
							<input name="nova" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control" id="nova3" maxlength="30">
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail1">ยืนยันพาสเวิร์ดใหม่</label>
							<input name="nova2" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control" id="nova22" maxlength="30">
						  </div>

						  <center>
										<button type="submit" name="Submit" onclick="return confirm(\'เปลี่ยนพาส ยืนยัน?\')" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> ยืนยัน</button> 
										</center>
							  </form>
					</div>
							  ';
	}
	else
	{
	$senha = stripslashes($_POST['atual']);
	$novasenhaPW = stripslashes($_POST['nova']);
	$novasenha2PW = stripslashes($_POST['nova2']);
	$username_check = 0;
	if($_SESSION['pass'] != $senha){
	$username_check = 1;
	}
	if (empty($novasenhaPW) ||empty($novasenha2PW))
	{
	;echo '                        <script>
								window.alert("กรอกข้อมูลให้ครบ!");
								window.location=\'?pagina=senha\';
							</script>
							';
	}
	elseif ($username_check == 1)
	{
	;echo '						<script>
								window.alert("รหัสปัจจุบันไม่ถูกต้อง!");
								window.location=\'?pagina=senha\';
							</script>
							';
	}
	elseif ($novasenhaPW != $novasenha2PW)
	{
	;echo '						<script>
								window.alert("รหัสไม่เท่ากัน!");
								window.location=\'?pagina=senha\';
							</script>
						   ';
	}
	else
	{
	$qry = "SELECT * FROM ZJJ_HISTOR_CHANGEPASS WHERE Email = '$login' ";
    $params = array();
	$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$stmt = sqlsrv_query($conn, $qry, $params, $options);
    if (sqlsrv_num_rows($stmt) == 1) {
      $qrydb = "UPDATE ZJJ_HISTOR_CHANGEPASS SET Old_Pass = '$pass', New_Pass = '$novasenhaPW', Time = GETDATE() WHERE Email='$login'";
    } else {
      $qrydb = "INSERT INTO ZJJ_HISTOR_CHANGEPASS VALUES ('$login', '$pass', '$novasenhaPW', GETDATE())";
    }
	
	$sql = sqlsrv_query($conn,"UPDATE Accounts SET MD5Password = '$novasenhaPW' WHERE email='$login'");
	$msqueryGC = "UPDATE UsersData SET GamePoints -= 0 WHERE CustomerID = '$customer'";
	$_SESSION['pass'] = $novasenhaPW;
	
	$historyCPass = sqlsrv_query($conn, $qrydb);
	$msresultsGC = sqlsrv_query($conn,$msqueryGC);
	
	if($msresultsGC && $historyCPass)
	{
	echo "<font color=green><b><h2><center>ทำการเปลี่ยนรหัสผ่านเรียบร้อยแล้ว!</center></h2></b></font>";
	}
	}
	}
	;echo '</div></div></div></div></div>
	<script type="text/javascript">
	function isEngchar(str,obj){
	    var isEng=true;
	    var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    var chk_text=str.split("");
	    chk_text.filter(function(s){        
	        if(orgi_text.indexOf(s)==-1){
	            isThai=false;
	            obj.value=str.replace(RegExp(s, "g"),\'\');
	        }           
	    }); 
	    return isEng; 
	}
	</script>'; 
?>