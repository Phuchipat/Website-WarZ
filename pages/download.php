<?php 
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
                            aria-hidden="true"></span>';echo $server ;;echo ' ';echo $login ;;echo '</h3>
                </div>
                <div class="panel-body">
						<div class="text-center" style="padding-top:3vh;"> 
						<table class="font12 table table-sm table-bordered">
								<thead class="font14 thead-inverse">
									<tr>
										<th width="33%" class="text-center">ชื่อ</th>
										<th width="33%" class="text-center">ราSSSยละเอียด</th>
										<th width="33%" class="text-center">ดาวน์โหลด</th>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">Games Launcher</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">ตัวเกม Launcher สำหรับทับตัวเกม</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="';echo $downloadlauncher ;;echo '">คลิกเพื่อโหลด</a></td>
									</tr>
									<tr>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">Games Full</span></td>
										<td width="33%" class="text-center"><span style="color:#FFFFFF">ตัวเกมฉบับเต็ม แตกไฟล์แล้วเล่นได้ทันที</span></td>
										<td width="33%" class="text-center"><a class="btn btn-success" href="';echo $downloadfull ;;echo '">คลิกเพื่อโหลด</a></td>
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
										<th width="50%" class="text-center">ความต้องการของระบบขั้นต่ำ</th>
										<th width="50%" class="text-center">ความต้องการของระบบขั้นแนะนำ</th>
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
		</div>'; ?>