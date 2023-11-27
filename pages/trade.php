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
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
';
$conn = connectDb();
include("config/setting_TRADE.php");
function updatepoint($id,$amta){
global $conn;
$amta = intval($amta);
$query = sqlsrv_query($conn,"UPDATE UsersData SET amounttopupall = amounttopupall-'".$amta."' WHERE CustomerID = '".$id."'");
return $query;
}
function additem($id,$rowtrade,$title){
global $conn;
$query = sqlsrv_query ($conn,"EXEC ZJJ_TRADE'".$id."','".$rowtrade."'");
return true;
}
$id = $_GET["id"];
if (isset($id) AND !empty($id)){
if ($tradeall[$id]){
if (intval($amta) >= intval($tradeall[$id]["amta"])){
if(updatepoint($customer,$tradeall[$id]["amta"])){
echo '<script>location="?warz=trade";</script>';
additem($customer,$tradeall[$id]["rowtrade"],$tradeall[$id]["title"]);
}else{
echo '<script>alert("Error Cannot Update");location="?warz=home";</script>';
}
}else{
echo '<script>alert("จำนวนยอดเติมเงินสะสม ไม่เพียงพอกรุณาเติม");location="?warz=topup";</script>';
}
}else{
echo '<script>alert("ไม่มียอดที่ท่านเลือกโปรดเลือกใหม่");location="?warz=trade";</script>';
}
}
;echo '<div class="row">
<center><h3>แลกไอเท็ม</h3></center>
<HR>
	<div class="col-md-8">
		<div class="card my-4 mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					';foreach ($tradeall as $rows =>$value){;echo '					
						 <div class="col-sm-8 col-md-6">
                                <div class="thumbnail">
                                    <center><img src="';echo $value["image"];;echo '" width="95%" alt=""></center>
                                    <div class="caption">
                                        <center>
                                            <h4>';echo $value["title"];;echo '</h4>
                                            <p><b>รายละเอียด';echo $value["detail"];;echo '</b></p>
                                            <p><b><u>ต้องมี ';echo $value["amta"];;echo ' ยอดสะสม</u></b></p>
                                            <p> <button onclick="confirmtradeall(';echo $rows;;echo ');" class="btn btn-primary btn-block"><i class="far fa-thumbs-up"></i>  แลก';echo $value["title"];;echo '</button></p>
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
					ยอดเติมเงินสะสม
					<span class="badge badge-primary badge-pill">';echo number_format($amta) ;;echo '</span>
				  </li>
				</ul>
          </div>
          </div>
   </div>
</div>
	<script type="text/javascript">
									function confirmtradeall(id) {
										swal({
											title: "คุณต้องการแลก ยอดสะสมลำดับที่" + id + " ใช่หรือไม่?",
											text: "หากกด OK จะทำการแลกยอดสะสมทันที!",
											icon: "warning",
											buttons: true,
											dangerMode: true,
										})
										.then((okx) => {
										if (okx) {
											swal("คุณได้ทำการแลกยอดสะสมเรียบร้อยแล้วโปรดตรวจสอบยอดสะสมคงเหลือและไอเท็มทีไ่ด้รับ !", {
											icon: "success",
											}).then(function() { 
											window.location.href="?warz=trade&id=" + id
										});
										} else {
											swal("คุณยังไม่ได้แลกยอดสะสม ณ เวลานี้!",{
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
</div>
'; ?>