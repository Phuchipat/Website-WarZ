<?php echo '﻿';
session_start();
if(isset($_SESSION["login"]) &&isset($_SESSION["pass"])){
$login = $_SESSION['login'];$pass = $_SESSION['pass'];$nome = $_SESSION['nome'];$email = $_SESSION['email'];}
else{
;echo '<script>
        window.alert("คุณยังไม่ได้เข้าสู่ระบบ!");
        window.location=\'index.php\';
    </script>
';};echo '';include "pages/menu.php";;echo '<div class="container">
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
                        <input name="atual" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control"  id="atual2" maxlength="100">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">พาสเวิร์ดใหม่ </label>
                        <input name="nova" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control" id="nova3" maxlength="100">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">ยืนยันพาสเวิร์ดใหม่</label>
                        <input name="nova2" onkeyup="isEngchar(this.value,this)" type="password"  class="form-control" id="nova22" maxlength="100">
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
$senha = md5('g5sc4gs1fz0h'.$_POST['atual']);
$novasenhaPW = md5('g5sc4gs1fz0h'.$_POST['nova']);
$novasenha2PW = md5('g5sc4gs1fz0h'.$_POST['nova2']);
$username_check = 0;
if(md5('g5sc4gs1fz0h'.$_SESSION['pass']) != $senha){
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
;echo '    <script>
                            window.alert("รหัสปัจจุบันไม่ถูกต้อง!");
                            window.location=\'?pagina=senha\';
                        </script>
                        ';
}
elseif ($novasenhaPW != $novasenha2PW)
{
;echo '    <script>
                            window.alert("รหัสไม่เท่ากัน!");
                            window.location=\'?pagina=senha\';
                        </script>
                        ';
}
else
{
$sql = sqlsrv_query($db,"UPDATE Accounts SET MD5Password = '$novasenhaPW' WHERE email='$login'");
$msqueryGC = "UPDATE UsersData SET GamePoints -= 0 WHERE CustomerID = '$customer'";
$_SESSION['pass'] = $novasenhaPW;
$msresultsGC = sqlsrv_query($db,$msqueryGC);
if($msresultsGC )
{
echo "<font color=green><b><h1>ดำเนินการเสร็จเรียบร้อย รหัสของคุณถูกเปลี่ยนแล้ว!</h1></b></font>";
}
}
}
;echo '</div></div></div></div></div>
<script type="text/javascript">
function isEngchar(str,obj){
    var isEng=true;
    var orgi_text=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var chk_text=str.split("");
    chk_text.filter(function(s){        
        if(orgi_text.indexOf(s)==-1){
            isThai=false;
            obj.value=str.replace(RegExp(s, "g"),\'\');
        }           
    }); 
    return isEng; 
}
</script>'; ?>