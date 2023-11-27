<?php echo '<meta charset="UTF-8">
';include "pages/menu.php";;echo '<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><span class="fa fa-bullhorn"></span> ประกาศ : </li> ';echo $New ;echo '            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-credit-card"></i> ระบบรับไอเท็ม</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-6">
								<div class="panel panel-primary">
									<div class="panel-heading">
									<center>
										<h3 class="panel-title">รับไอเท็ม Youtube</h3>
									</div>
									<div class="panel-body">
								
								<a href="#promotion" data-toggle="modal"><img
									src="';echo $photoyoutube ;;echo '" class="img-rounded" width="100%"
									height="100%">
								</a>
							</div>	
									
										<form action="" method="POST">
										
										<input class="btn btn-primary btn-block" type="submit" name="btngetitemyoutube" value="รับไอเท็ม">
										</center>
										</form>
									</div>
									<div class="panel-footer">
										<center>สามารถกดรับได้เพียง <span class="badge badge-primary badge-pill">';echo number_format($getyt) ;echo '</span> ครั้ง</center>
									</div>
								</div>
							</div>
							';
$btngetitemyoutube = $_POST['btngetitemyoutube'];
if($btngetitemyoutube){
if ($getyt <1){
js_alert('ไม่สามารถรับไอเท็มได้เนื่องจากจำนวนในการรับไอเท็มไม่เพียงพอ','error');
exit();
}else {
$msqueryGC = "UPDATE UsersData SET GetItemYoutube -= 1 WHERE CustomerID = '$customer'";
$msresultsGC = sqlsrv_query($conn,$msqueryGC);
$initem = sqlsrv_query($conn,"INSERT INTO ZJJ_HISTORY_GETITEMYOUTUBE (customerid, detail, ddtime) VALUES ('$customer', 'รับไอเท็ม YOUTUBE', GETDATE());");
$additem = sqlsrv_query($conn,"EXEC ZJJ_GETYOUTUBE '1','".$customer."'");
js_alert('ทำการรับไอเท็ม YouTube เรียบร้อยแล้ว','success');
exit();
}
}
;echo '					
								
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal -->
<div id="promotion" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">โปรโมชั่นการเติมเงิน</h4>
            </div>
            <img src="';echo $photoyoutube ;;echo '" class="img-rounded" width="100%" height="100%">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(\'#promotion\').modal(\'show\');
    });
</script>
'; ?>