<?php  include "pages/menu.php";;echo '<div class="container">
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';echo $server ;;echo ' (';echo $login ;;echo ')</h3>
                </div>
				
                <div class="panel-body">
				<div class="col-md-12">
									<div class="text-center" style="padding-top:3vh;">
										สิทธิ์ ในการเปลี่ยนสีชื่อ <span class="label label-success">';echo number_format($rc);;echo '</span> สิทธิ์
										</br></br>
									</div>
								</div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
								<div class="col-md-6 col-md-offset-3">
								
									<div class="panel panel-default">
										<div class="panel-heading"><h3 class="panel-title"><center><i class="fas fa-paint-brush"></i> เปลี่ยนสีของชื่อ</h3></div>
											<div class="panel-body">
											';if (empty($_POST['name'])) {;echo '										<form name="mudasenha" id="mudasenha" method="post" class="form-horizontal">
											  ';
$query = "select * from UsersChars where CustomerID = '$customer'";
$result = sqlsrv_query( $conn,$query);
$count = sqlsrv_query( $conn,$query);
if( $result === false ||$count === false) {
die( print_r( sqlsrv_errors(),true));
}
$count = count(sqlsrv_fetch_array( $count,SQLSRV_FETCH_ASSOC));
if($count >0)
{
;echo '												 <div class="form-group">
													 <center>เลือกตัวละคร  </center>
													<div class="col-sm-12">
												 <select name="name" class="form-control">
												  ';
while( $row = sqlsrv_fetch_array( $result,SQLSRV_FETCH_ASSOC))
{
echo '<option value="';
echo $row['CharID'];
echo '"> ';
echo $row['Gamertag'];
echo '</option>';
}
;echo ' 
												  </select>
												  </div>
												</div>
												<div class="form-group">
												 <center>สีของชื่อตัวละคร  </center>
													<div class="col-sm-12">
														<select class="form-control" name="colors" id="colors">
														<option value="0">เลือกสีด้วยครับ</option>
														<option value="';echo $colorname1 ;;echo '" style="background-color: #';echo $codecolor1 ;;echo '">';echo $colornamergb1 ;;echo '</option>
														<option value="';echo $colorname2 ;;echo '" style="background-color: #';echo $codecolor2 ;;echo '">';echo $colornamergb2 ;;echo '</option>
														<option value="';echo $colorname3 ;;echo '" style="background-color: #';echo $codecolor3 ;;echo '">';echo $colornamergb3 ;;echo '</option>
														<option value="';echo $colorname4 ;;echo '" style="background-color: #';echo $codecolor4 ;;echo '">';echo $colornamergb4 ;;echo '</option>
														<option value="';echo $colorname5 ;;echo '" style="background-color: #';echo $codecolor5 ;;echo '">';echo $colornamergb5 ;;echo '</option>
														<option value="';echo $colorname6 ;;echo '" style="background-color: #';echo $codecolor6 ;;echo '">';echo $colornamergb6 ;;echo '</option>
														<option value="';echo $colorname7 ;;echo '" style="background-color: #';echo $codecolor7 ;;echo '">';echo $colornamergb7 ;;echo '</option>
														<option value="';echo $colorname8 ;;echo '" style="background-color: #';echo $codecolor8 ;;echo '">';echo $colornamergb8 ;;echo '</option>
														<option value="';echo $colorname9 ;;echo '" style="background-color: #';echo $codecolor9 ;;echo '">';echo $colornamergb9 ;;echo '</option>
														<option value="';echo $colorname10 ;;echo '" style="background-color: #';echo $codecolor10 ;;echo '">';echo $colornamergb10 ;;echo '</option>
														<option value="';echo $colorname11 ;;echo '" style="background-color: #';echo $codecolor11 ;;echo '">';echo $colornamergb11 ;;echo '</option>
														<option value="';echo $colorname12 ;;echo '" style="background-color: #';echo $codecolor12 ;;echo '">';echo $colornamergb12 ;;echo '</option>
														<option value="';echo $colorname13 ;;echo '" style="background-color: #';echo $codecolor13 ;;echo '">';echo $colornamergb13 ;;echo '</option>
														</select>
													</div>
													
												  </div>
											</div>
										<div class="panel-footer">
											<center><small id="emailHelp" class="form-text text-muted">*โปรดเลือกตัวละคร และสีที่ต้องการ</small></center>
											</div>
										</div>
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit" name="submit" ><i class="far fa-thumbs-up"></i> ทำการเปลี่ยนสีชื่อ</button>
										</div>
									</div>
                                </div>
								</form>
						  ';
}
else
{
;echo '               <p style="color:red">ยังไม่มีตัวละคร</p>
               ';
}
;echo '               <p>
               ';
}
else
{
$name = stripslashes($_POST['name']);
$name = htmlspecialchars($name,ENT_QUOTES);
$colors = stripslashes($_POST['colors']);
$colors = htmlspecialchars($colors,ENT_QUOTES);
if($rc <$rcpoints)
{
echo "<script>alert('ไม่พบสิทธิ์การเปลี่ยนชื่อ!');window.location='?warz=recolorname';</script>";
}
else
{
$conn = new PDO("sqlsrv:server=$ip_port ; Database = $dbName",$userName,$userPassword);
$conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING,PDO::SQLSRV_ENCODING_UTF8);
$sql = "SELECT *From UsersChars";
$tsql2 = "UPDATE UsersChars SET $dbcolor = ? WHERE CharID = ?";
$params = array($_POST["colors"],$_POST["name"]);
$stmt = $conn->prepare($tsql2);
$stmt->execute($params);
$tsql5 = "UPDATE UsersData SET RecolorPoints = $rc-$rcpoints WHERE CustomerID = '$customer'";
$params = array( $_POST["name"]);
$stmt = $conn->prepare($tsql5);
$stmt->execute($params);
js_alert('ระบบได้ทำการเปลี่ยนสีของชื่อตัวละครเรียบร้อยแล้ว','success');
}
}
;echo '                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login form-->
</div>
</div>
 <script type="text/javascript">
				function isEngchar(str,obj){
				    var isEng=true;
				    var orgi_text=" กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮะาิีึืุูเแโัำไใฤฦ่้๊๋์ฯ็ํๅabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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