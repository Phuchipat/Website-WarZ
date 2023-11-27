<?php 
    include "pages/menu.php";
echo '
<div class="container">
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
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';echo $server ;;echo ' (';echo $login ;;echo ')
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!--in body-->
                                    <div class="col-md-6">
                                        <center>
											<img id="display-Itemimg" src="assets/image/box.png" style="width: auto; height: 250px;">
										</center>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-left" style="margin-bottom: 90px; font-family: Mitr">
                                            <h4><i class="fa fa-credit-card"></i> รายละเอียด Point ที่ใช้ในการสุ่ม</h4>
                                            <hr>
                                            <div style="padding: 5px 0px;font-size: 16px;font-weight: bold;">
                                                Point ที่ใช้ในการสุ่ม
                                                <span style="float: right">Point ที่มี</span>
                                            </div>
                                            <div style="padding: 5px 0px;">
                                                <span>สุ่มครั้งละ '.$item_rand_eachtime.' GC</span>
                                                <span id="currentgc" style="float: right">'.$gc.' GC</span>
                                            </div>
                                        </div>
                                        <center>
                                            <button class="btn btn-md btn-success" id="BtnRandom" onclick="return false"><i class="fa fa-random"></i> ทำการสุ่มไอเทม</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login form-->
</div>
<!-- modal -->
<div id="promotion" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">โปรโมชั่นการเติมเงิน</h4>
            </div>
            <img src="';echo $photorandom ;;echo '" class="img-rounded" width="100%" height="100%">
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
</script>'; 
?>