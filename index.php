<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
$login = null;
$pass = null;
$nome = null;
$email = null;
if(isset($_SESSION["login"]) && ($_SESSION["pass"])){
    $login = $_SESSION["login"];
    $pass = $_SESSION['pass'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
}

include "config/connect.php";
include "config/setting.php";
include "sql_inject.php";
include "config/select.php";
;echo '

<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>';echo $warzname ;;echo '</title>
		<meta name="robot" content="index, dofollow">
		<meta name="robots" content="index, dofollow">
		<meta name="revisit-after" content="1 days">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description"
            content="WarZ-';echo $title ;;echo '.com : Survival in Thailand เหล่าผู้รอดชีวิต Survivor ที่ต้องเอาชีวิตในแต่ละวันให้จงได้ Warz ประเทศไทย, Warz, ';echo $title ;;echo ', WarZ-';echo $title ;;echo ', Thailand, วอชี, วอซีเถื่อน, WARZ เถื่อน	 WARZ ONLINE, โหลดวอซีเถื่อน, เกมส์ WarZ, โปรวอซีเถื่อน, เซิฟวอซีเถื่อน, วอซีเถื่อน, บอทวอซี, วอซีเปิดใหม่, วอซีออนไลน์">
        <meta name="keywords"
            content="WarZ-';echo $title ;;echo '.com, Survival in Thailand, WarZ-';echo $title ;;echo ' ไทย, warz ประเทศไทย,warz, Thailand,วอชี,วอซีเถื่อน,WARZ เถื่อน,WARZ ONLINE,โหลดวอซีเถื่อน,เกมส์ WarZ,โปรวอซีเถื่อน,เซิฟวอซีเถื่อน,วอซีเถื่อน,บอทวอซี,วอซีเปิดใหม่,วอซีออนไลน์">
        <meta name="author" content="WarZ-';echo $title ;;echo '.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-language" content="th" />
        <meta property="og:title"
            content="WarZ-';echo $title ;;echo '.com : Survival in Thailand : Warz ประเทศไทย, Warz, วอชี, วอซีเถื่อน, WARZ เถื่อน, เซิฟวอซีเถื่อน, วอซีเถื่อน, วอซีเปิดใหม่, วอซีออนไลน์" />
        <meta property="og:site_name" content="WarZ-';echo $title ;;echo '.com">
        <meta property="og:url" content="index.html" />
        <meta property="og:description"
            content="WarZ-';echo $title ;;echo '.com : Survival in Thailand เหล่าผู้รอดชีวิต Survivor ที่ต้องเอาชีวิตในแต่ละวันให้จงได้ Warz ประเทศไทย, Warz, ';echo $title ;;echo ', WarZ-';echo $title ;;echo ', Thailand, วอชี, วอซีเถื่อน, WARZ เถื่อน, WARZ ONLINE, โหลดวอซีเถื่อน, เกมส์ WarZ, โปรวอซีเถื่อน, เซิฟวอซีเถื่อน, วอซีเถื่อน, บอทวอซี, วอซีเปิดใหม่, วอซีออนไลน์" />
        <meta property="og:locale" content="th_TH" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/slate/bootstrap.min.css"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
            crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css"
            crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="';echo $icon ;;echo '">
        <link href="assets/css/default.min.css" rel="stylesheet">
        <link href="assets/css/responsive_overide.css" rel="stylesheet">
        <link href="assets/css/custom_v1.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <script id="_carbonads_projs" type="text/javascript" src="http://srv.carbonads.net/ads/C6AILKT.json?segment=placement:bootswatchcom&amp;callback=_carbonads_go">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.buttonload {
  background-color: none; /* Green background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: none; /* Some padding */
  font-size: 16px; /* Set a font-size */
}


}
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 1.5px;
  background-color: none;
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.3); 
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#mySidenav a {
  position: absolute;
  right: -80;
  transition: 1.3s;
  padding: auto;
  width: 180px;
  text-decoration: none;
  font-size: 14px;
  color: white;
  border-radius: 7px 0 0 7px;
}

#mySidenav a:hover {
  right: 0;
}

#about {
  top: 100px;
  background-color: #4CAF50;
}

#blog {
  top: 87px;
  background-color: #2196F3;
}

</style>
  <script type="text/javascript">
// <![CDATA[
/* No Right Click */

var message="F5";
function clickIE4()
{
	if (event.button==2)
	{
		alert(message);
		return false;
	}
}
function clickNS4(e)
{
	if (document.layers||document.getElementById&&!document.all)
	{
		if (e.which==2||e.which==3)
		{
			alert(message);
			return false;
		}
	}
}
if(document.layers)
{
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown=clickNS4;
}
else if(document.all&&!document.getElementById)
{
	document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false");
/* End No Right Click */

/* No Highlighting */
var omitformtags=["input", "textarea", "select"];
omitformtags=omitformtags.join("|");
function disableselect(e)
{
	if (omitformtags.indexOf(e.target.tagName.toLowerCase())==-1)
	return false
}
function reEnable()
{
	return true
}
if(typeof document.onselectstart!="undefined")
{
	document.onselectstart=new Function ("return false")
}
else
{
	document.onmousedown=disableselect;
	document.onmouseup=reEnable;
}
/* End  No Highlighting */
// ]]>
</script>
	</head>

    <body>
	
        <header>
		
            <!--logo-->
            <div class="container">
                </br>
                <center><img class="animated infinite pulse delay-1s" src="';echo $logo ;;echo '" width="40%" alt="AAAZ"
                        height="40%"></center>
            </div>
        </header>
        <!--content-->
        <!-- เริ่ม login-->

        ';if(!isset($_SESSION["login"]) && !isset($_SESSION["pass"])) {;echo '        <!--navbar-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a style="color:#00FFF0;" href="index.php?warz=home"><span class="glyphicon glyphicon-home"></span>
                                หน้าแรก</a></li>
                        <li><a style="color:#0093FF;" href="';echo $facebookgroup ;;echo '"><i class="fab fa-facebook"></i> กลุ่มเซิฟเวอร์</a>
                        </li>
                        <li><a style="color:#FFF300;" href="download.php"><span class="glyphicon glyphicon-download-alt"></span> ดาวน์โหลด</a>
                        </li>
						
						<!--<li><a href="contact.php"><span class="glyphicon glyphicon-download-alt"></span> ดาวน์โหลด สำรอง</a>-->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
					<!--<li><a href="/sitemap.xml">Sitemap</a></li>-->
                        <li><a style="color:#0CFF00;" href="#">
   <i class="fa fa-circle-o-notch fa-spin" ></i></span> ผุ้เล่นออนไลน์ :<span style="color:#FF0400;">
                                ';echo $useronline;;echo '
</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
		
        <!--div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><h1 style="color:white; font-size:30px;"><span class="fa fa-bullhorn">&nbsp;</span>AAAZ</h1></li> ประกาศ :  ';echo $New ;echo '</h1></ol>
                </div>
            </div>
        </div-->

        <div class="container">
            <!--login form-->
            <div class="row">
			

  

</div>
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title"><span  style="color:#0CFF00;" class="glyphicon glyphicon-chevron-right"
                                    aria-hidden="true"></span> ';echo $server ;;echo ' </h2>
									
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
								

</div>
                                    <!--in body-->
									 
                                               <center><img class="animated infinite pulse delay-1s" src="';echo $photologxgc ;;echo '" width="40%" alt="AAAZ"
                        height="40%"></center>
                                            </div>
                                    <form id="login-form" action="login.php" method="post">
                                        <center>
										<!--/in body-->

									<div class="col-xs-7">
						<div class="panel panel-warning">
						  <div class="panel-heading">
						  <h3 class="panel-title">PROMOTION New
                                                    <small>(โปรโมชั่นการเติมเงิน)</small> </h3>
						  </div>
						  <div class="panel-body">
						
                                                <a href="#promotion" data-toggle="modal">
												
												<div class="zoom">
													<img src="';echo $photopromo ;;echo '" class="animated infinite pulse"  alt="AAAZ" width="100%" height="100%">
													</div>
												</a>

												  
                                            </div>
											
                                           <div class="col-md-8">
											</div>
											
                                   </div>											
									</div>
						
						
                                        
                    <!--div class="col-xs-5"-->
					 <div class="col-xs-5">
						<div class="panel panel-success">
						  <div class="panel-heading">
						  
							<h3 class="dark-text" style="font-family: Kanit"><i class="fa fa-user"></i> เข้าสู่ระบบ</h3>
						  </div>
						  <div class="panel-body">
                                               
                                                <table width="338" border="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td width="239">
															
                                                                <div class="control-group">
																  
                                                                    <label  class="control-label"
																	
                                                                        for="email"  > <i class="fa fa-fw fa-user"></i>Email (ชื่อผู้ใช้งาน)</label>
                                                                    <div class="controls">
                                                                        <div class="has-error" style="margin-bottom:5px">
																		
																		 <input name="login" type="email" id="login" class="form-control input-sm" placeholder="อีเมล" required="" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                           <td width="239">
                                                                <div class="control-group">
                                                                    <label class="control-label"
                                                                        for="email"><i class="fa fa-fw fa-lock"></i>Password (รหัสผ่าน)</label>
                                                                    <div class="controls">
                                                                        <div class="has-error"
                                                                            style="margin-bottom:5px">
                                                                            <input name="pass" type="password" id="pass"
                                                                                class="form-control input-sm"
                                                                                placeholder="รหัสผ่าน" required="">
																				
																				  </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                           <td width="239">
                                                                <div class="control-group">
                                                                    <label class="control-label"
                                                                        for="email"><i class="fa fa-fw fa-lock"></i>RE-Password (ยืนยันรหัสผ่าน)</label>
                                                                    <div class="controls">
                                                                        <div class="has-error"
                                                                            style="margin-bottom:5px">
                                                                            <input name="pass" type="password" id="dsads"
                                                                                class="form-control input-sm"
                                                                                placeholder="ยืนยันรหัสผ่าน" required="">
																				 <div class="checkbox">
																				<label><input type="checkbox"> Remember Password (จดจำรหัสผ่าน)</label>
  </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
														<tr>
                                                           <td width="239">
														   
														 <div align="center">
														 
                                                    <button type="submit" name="button" class="btn btn-success btn-block"
                                                        value="เข้าสู่ระบบ"><i class="fa fa-sign-in"></i>  เข้าสู่ระบบ</button>
														
                                                </div>
												
												 </td>
						 <br>

                                                        </tr>
														
                                                    </tbody>
                                                </table>
                                              
                                        </center>
										  <a href="#promotion" data-toggle="modal">
												
												
												<a href="https://www.facebook.com/suttipong.chaimontree.75">
													<img src="';echo $photobacara ;;echo '" class="animated infinite pulse"  align="left" width="50%" height="40%">
												</a>
												
												<a href="https://www.facebook.com/suttipong.chaimontree.75">
													<img src="';echo $photobacara ;;echo '" class="animated infinite pulse"  align="right" width="50%" height="40%">
												</a>
</div>
                                            </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--login form-->
			
        </div>
        <!--End Home-->
        <!-- modal -->

        

        <script type="text/javascript">
        $(document).ready(function() {
            $(\'#promotion\').modal(\'show\');
        });
        </script>
        <!-- สิ้นสุด login-->
        ';}else {;echo '        ';
if(isset($_GET['warz'])){
if(file_exists("pages/".trim($_GET['warz']).".php")){
require_once("pages/".trim($_GET['warz']).".php");
}else{
require_once("pages/home.php");
}
}else{
require_once("pages/home.php");
}
;echo '
        ';};echo '        <div class="jumbotron">
		<div class="container text-center">
			
											<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"><span style="color:#68FF33 ">เว็บไซต์เซิฟเวอร์ เฟรนซี ‼ เซิฟนี้มันสุด ๆๆ ‼ <span style="color:#FF1919 ">Talk</span>💯<span style="color:#FF1919 ">Trade </span>พัฒนาโดย <a href="https://www.facebook.com/suttipong.chaimontree.75"> <span style="color:#33DAFF">ANIC-STUDIO ‼ </a> </span>
  
  </div>
  	
		</div>
	<audio controls >																						
  <source src="/site/assets/Mp3/Low_Season_AFz.mp3" autostart="true"   >
</audio>
	</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js" crossorigin="anonymous">
        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/js/custom_v1.js"></script>

    </body>
</html>

'; ?>
