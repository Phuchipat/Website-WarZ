<?php  include "pages/menu.php";;echo '<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><span class="fa fa-bullhorn"></span> ประกาศ : </li> ';echo $New ;echo '
            </ol>
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
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
';
$conn = connectDb();
include("config/setting_VIP.php");
function updatepoint($id,$amountvip){
global $conn;
$amountvip = intval($amountvip);
$query = sqlsrv_query($conn,"UPDATE UsersData SET amountvip = amountvip-'".$amountvip."' WHERE CustomerID = '".$id."'");
return $query;
}
function additem($id,$rowvip,$title){
global $conn;
$query = sqlsrv_query ($conn,"UPDATE UsersData SET nkzVIP = '".$rowvip."' WHERE CustomerID = '".$id."'");
return true;
}
$id = $_GET["id"];
if (isset($id) AND !empty($id)){
if ($getvip[$id]){
if (intval($amountvip) >= intval($getvip[$id]["amountvip"])){
if(updatepoint($customer,$getvip[$id]["amountvip"])){
echo '<script>location="?warz=vip";</script>';
additem($customer,$getvip[$id]["rowvip"],$getvip[$id]["title"]);
}else{
echo '<script>alert("Error Cannot Update CharPoints");location="?warz=home";</script>';
}
}else{
js_alert2('จำนวนยอดเติมเงินสะสม ไม่เพียงพอกรุณาเติมเงิน!','error');
}
}else{
js_alert2('ไม่มีVIPที่ท่านเลือกโปรดเลือกใหม่!','error');
}
}
;echo '<div class="row">

	<div class="col-md-8">
		<div class="card my-4 mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					';foreach ($getvip as $rows =>$value){;echo '
						 <div class="col-sm-8 col-md-6">
                                <div class="thumbnail">
                                    <center><img src="';echo $value["image"];;echo '" width="50%" alt=""></center>
                                    <div class="caption">
                                        <center>
                                            <h4>';echo $value["title"];;echo '</h4>
                                            <p><b>รายละเอียด ';echo $value["detail"];;echo '</b></p>
                                            <p><b><u>ต้องมี ';echo $value["amountvip"];;echo ' ยอดสะสม</u></b></p>
                                            <p> <button onclick="confirmgetvip(';echo $rows;;echo ');" class="btn btn-primary btn-block"><i class="far fa-thumbs-up"></i>  แลก';echo $value["title"];;echo '</button></p>
                                        </center>
                                    </div>
                                </div>
                            </div>

							';};echo '					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
	<div class="card my-4 mb-3">
          <div class="card-body">
              <ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					อีเมลล์
					<span class="badge badge-primary badge-pill">';echo $login ;;echo '</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					หมายเลขไอดี
					<span class="badge badge-primary badge-pill">';echo $customer ;;echo '</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					สถานะไอดี
					';switch ($accdev){
case 0: $accdev = "<span class='badge badge-primary badge-pill'><font color='#FFFFFF'>สมาชิก</font></span>";
break;
case 10: $accdev = "<span class='badge badge-danger badge-pill'><font color='FFFFFF'>DevWeb</font></span>";
break;
case 15: $accdev = "<span class='badge badge-danger badge-pill'><font color='FFFFFF'>Dev</font></span>";
break;
case 125: $accdev = "<span class='badge badge-danger badge-pill'><font color='FFFFFF'>Dev</font></span>";
break;
case 126: $accdev = "<span class='badge badge-danger badge-pill'><font color='FFFFFF'>Dev</font></span>";
break;
default:$accdev = "Error #warz001";
break;
};echo '';echo $accdev;;echo '				  </li>
				   <li class="list-group-item d-flex justify-content-between align-items-center">
					สถานะ<img src="assets/image/VIPZ.gif" width="13%">
					<span class="badge badge-primary badge-pill">';echo $VIPsNum ;;echo '</span>
				  </li>
				   <li class="list-group-item d-flex justify-content-between align-items-center">
					ยอดเติมเงินสะสมvip
					<span class="badge badge-primary badge-pill">';echo number_format($amountvip) ;;echo '</span>
				  </li>
				   <li class="list-group-item d-flex justify-content-between align-items-center">
				   ';
if($VIPsNum == 1){
echo "<img src='assets/img/vip1.png' width='100%'>";
}elseif ($VIPsNum == 3){
echo "<img src='assets/img/vip3.png' width='100%'>";
}elseif ($VIPsNum == 5){
echo "<img src='assets/img/vip5.png' width='100%'>";
}elseif ($VIPsNum == 7){
echo "<img src='assets/img/vip7.png' width='100%'>";
}elseif ($VIPsNum == 10){
echo "<img src='assets/img/vip10.png' width='100%'>";
}
;echo '				  </li>
				</ul>
          </div>
          </div>
   </div>
    </div>
</div>

<script type="text/javascript">
									function confirmgetvip(id) {
										swal({
											title: "คุณต้องการแลก VIP ใช่หรือไม่?",
											text: "หากกด OK จะทำการแลกVIPทันที!",
											icon: "warning",
											buttons: true,
											dangerMode: true,
										})
										.then((okx) => {
										if (okx) {
											swal("คุณได้ทำการแลกVIPเรียบร้อยแล้วโปรดตรวจสอบสถานะVIP !", {
											icon: "success",
											}).then(function() {
											window.location.href="?warz=vip&id=" + id
										});
										} else {
											swal("คุณยังไม่ได้แลกVIP ณ เวลานี้!",{
												icon: "success",
											});
										}
										});
									}

							</script>
				</div>
			</div>
		</div>
	</div>
</div>'; ?>
