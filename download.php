<?php echo '<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>';echo $warzname ;;echo '</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robot" content="index, dofollow">
		<meta name="robots" content="index, dofollow">
		<meta name="revisit-after" content="1 days">
        <meta name="description"
            content="WarZ-';echo $title ;;echo '.com : Survival in Thailand เหล่าผู้รอดชีวิต Survivor ที่ต้องเอาชีวิตในแต่ละวันให้จงได้ Warz ประเทศไทย, Warz, ';echo $title ;;echo ', WarZ-';echo $title ;;echo ', Thailand, วอชี, วอซีเถื่อน, WARZ เถื่อน, WARZ ONLINE, โหลดวอซีเถื่อน, เกมส์ WarZ, โปรวอซีเถื่อน, เซิฟวอซีเถื่อน, วอซีเถื่อน, บอทวอซี, วอซีเปิดใหม่, วอซีออนไลน์">
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
    </head>

    <body>
';
include "config/setting.php";
;echo '<header>
            <!--logo-->
            <div class="container">
                </br>
                <center><img class="animated infinite pulse delay-1s" src="';echo $logo ;;echo '" width="40%"
                        height="40%"></center>
            </div>
        </header>
 <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php?warz=home"><span class="glyphicon glyphicon-home"></span>
                                หน้าแรก</a></li>
                        <!--<li><a href="';echo $facebookgroup ;;echo '"><i class="fab fa-facebook"></i> กลุ่มเซิฟเวอร์</a>-->
                        </li>
                        <li><a href="download.php"><span class="glyphicon glyphicon-download-alt"></span> ดาวน์โหลด</a>
                        </li>
						<!--<li><a href="contact.php"><span class="glyphicon glyphicon-download-alt"></span> ดาวน์โหลด สำรอง</a>-->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span>ผุ้เล่นออนไลน์ :-->
                                ';echo $useronline;;echo '</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
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
                            aria-hidden="true"></span>';echo $server ;;echo ' ';echo $login ;;echo '</h3>
                </div>
                <div class="panel-body">
						<div class="text-center" style="padding-top:3vh;"> 
						<table class="font12 table table-sm table-bordered">
								<thead class="font14 thead-inverse">
									<tr>
										<th width="33%" class="text-center"><span style="color:#00FFD1">ชื่อ</th>
										<th width="33%" class="text-center"><span style="color:#FFEC00">รายละเอียด</th>
										<th width="33%" class="text-center"><span style="color:#2EFF00">ดาวน์โหลด</th></span>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">ตัวเต็ม</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">แนะนำ</span>ตัวเต็มโหลดน้อยเล่นเร็ว</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="';echo $downloadfullv1 ;;echo '">คลิกเพื่อโหลด</a></td>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">ตัวเต็ม</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">แนะนำ</span>ตัวเต็มโหลดน้อยเล่นเร็ว</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="';echo $downloadfullv2 ;;echo '">คลิกเพื่อโหลด</a></td>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">ตัวเต็ม</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">แนะนำ</span> ตัวเต็มโหลดน้อยเล่นเร็ว</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="';echo $downloadfullv3 ;;echo '">คลิกเพื่อโหลด</a></td>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">Anydesk</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">โปรแกรมรีโหมดสำหรับควบคุมคอมพิวเตอร์ระยะไกล</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="https://anydesk.com/remote-desktop">คลิกเพื่อโหลด</a></td>
									</tr>
								</thead>
						</table>
						
						<table class="font12 table table-sm table-bordered">
								<thead class="font14 thead-inverse">
									<tr>
										<th width="50%" class="text-center"><span style="color:#27FF00">ความต้องการของระบบขั้นต่ำ</th></span>
										<th width="50%" class="text-center"><span style="color:#FFA600"> ความต้องการของระบบขั้นแนะนำ</th> </span>
									</tr>
									<tr>
										<td width="50%" class="text-center"><span style="color:#87CEFA">
																	OS : Windows Vista/Windows 7 (enhanced for 64-bit OS) </br>
																	CPU : 2.4 GHZ Duo Core or better </br>
																	Memory : 2 GB RAM </br>
																	Graphics : NVIDIA 8800 GT or Radeon X1950 XTX</br>
																	DirectX® : 9.0 </br>
																	Hard Drive : 5 GB HDD Space </br>
																	Sound : Windows Compatible Sound Card
																	</span></td>
										<td width="50%" class="text-center"><span style="color:#FFD700">
																	OS : Windows 7 (enhanced for 64-bit OS) </br>
																	Processor : Quad Core i5 2.4 GHz or better </br>
																	Memory : 4 GB RAM </br>
																	Graphics : NVIDIA GTX 460 or ATI Radeon HD 5850 </br>
																	DirectX® : 11 </br>
																	Hard Drive : 5 GB HD space </br>
																	Sound : Windows Compatible Sound Card</span></td>
									</tr>
								</thead>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		 </div>
 <!--End Home-->
        <!-- modal -->

        

        <div class="jumbotron">
		<div class="container text-center">
			
											<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%"><span style="color:#68FF33 ">เว็บไซต์เซิฟเวอร์ ....... ‼ เซิฟนี้มันสุด ๆๆ ‼ <span style="color:#FF1919 ">Talk</span>💯<span style="color:#FF1919 ">Trade </span>พัฒนาโดย <a href="https://www.facebook.com/aofz.apichat.9"> <span style="color:#33DAFF">AOFZ APICHAT ‼ </a> </span>
  
  </div>
  	
		</div>
	<audio controls >																						
  <source src="/site/assets/Mp3/Low_Season_AFz.mp4" autostart="true"   >
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
