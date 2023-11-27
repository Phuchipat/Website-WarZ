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
										สิทธิ์ ในการเปลี่ยนชื่อตัวละคร <span class="label label-success">';echo number_format($rn);;echo '</span> สิทธิ์
										</br></br>
									</div>
								</div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
								<div class="col-md-6 col-md-offset-3">
								
									<div class="panel panel-default">
										<div class="panel-heading"><h3 class="panel-title"><center><i class="fas fa-paint-brush"></i> เปลี่ยนชื่อ ไทย - อังกฤษ</h3></div>
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
;echo '													 <div class="form-group">
														<label for="charname" class="col-sm-6 control-label">เลือกตัวละคร  </label>
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
													<label for="exampleInputEmail1" class="col-sm-6 control-label">ชื่อที่ต้องการ </label>
													<div class="col-sm-12">
														<input type="text" class="form-control" name="tagn" onkeyup="isEngchar(this.value,this)" 
														maxlength="';echo $maxtext ;;echo '" placeholder="ชื่อที่ต้องการ ';echo $maxtext ;;echo ' ตัวอักษร">
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
$gamertagn = stripslashes($_POST['tagn']);
$gamertagn = htmlspecialchars($gamertagn,ENT_QUOTES);
if (empty($gamertagn))
{
echo "<script>alert('กรุณาใส่ชื่อใหม่');window.location='?warz=rename';</script>";
}
elseif ($rn <$rnpoints)
{
echo "<script>alert('ไม่พบสิทธิ์การเปลี่ยนชื่อ!');window.location='?warz=rename';</script>";
}
else
{
if(preg_match("/^[ก-ฮa-zA-Z0-9ะาิีึืุูเแโัำไใฤฦ่้๊๋์ฯ็ํๅ$]+$/",$_POST['tagn'])) 
{
$qry = "SELECT Gamertag From UsersChars WHERE CharID = '".$_POST['name']."'";
$stmt = sqlsrv_query($conn, $qry);
$res = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
	
$conn = new PDO("sqlsrv:server=$ip_port ; Database = $dbName",$userName,$userPassword);
$conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING,PDO::SQLSRV_ENCODING_UTF8);
$sql = "SELECT *From UsersChars";
$tsql = "UPDATE UsersChars SET Gamertag = ? WHERE CharID = ?";
$params = array($_POST["tagn"],$_POST["name"]);
$stmt = $conn->prepare($tsql);
$stmt->execute($params);
$tsql3 = "UPDATE UsersChars SET CharRenameTime = GETDATE() WHERE CharID = ?";
$params = array($_POST["name"]);
$stmt = $conn->prepare($tsql3);
$stmt->execute($params);
$tsql4 = "INSERT INTO ZJJ_HISTOR_RENAME (CustomerID, Charid, OldName, NewName, Color, DataTime) VALUES ('$customer', ?, ?, ?, '$colors', GETDATE())";
$params = array($_POST["name"],$res['Gamertag'], $_POST["tagn"]);
$stmt = $conn->prepare($tsql4);
$stmt->execute($params);
$tsql5 = "UPDATE UsersData SET RenamePoints = $rn-$rnpoints WHERE CustomerID = '$customer'";
$params = array( $_POST["name"]);
$stmt = $conn->prepare($tsql5);
$stmt->execute($params);
js_alert('ระบบ : ทำการเปลี่ยนชื่อตัวละครเรียบร้อยแล้ว','success');
}
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