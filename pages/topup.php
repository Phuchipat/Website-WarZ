<?php echo '<script type="text/javascript" src=\'https://www.tmtopup.com/topup/3rdTopup.php?uid=';echo $TMTUID ;;echo '\'></script> 
';include "pages/menu.php";;echo '<div class="container">
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!--in body-->
									
                                    <center>
                                        <div class="col-md-5">
                                            <h4 align="center" class="section-title">Refill for Game Points
                                                <small>(GC)</small> </h4>
                                            <br>
                                            <div id="TopupTruemoney" class="truemoney-refill text-center">

                                                <center>
                                                    <div class="header-title">Truemoney PIN <small>(รหัสเติมเงิน)</small> : 
											<input name="tmn_password" id="tmn_password" type="text" maxlength="14" class="input-sm"autocomplete="off"></div>
                                            <input name="ref1" size="70" value="';echo $login;;echo '" type="hidden" class="form-control" id="ref1" readonly />
                                            <input name="ref2" class="form-control" value="';echo $customer;;echo '" type="hidden" id="ref2" readonly />
                                            <input name="ref3" class="form-control" value="1" type="hidden" id="ref3" readonly />
                                                    <br>
                                                    <button type="submit" class="btn btn-lg btn-jjth btn-success" onclick="submit_tmnc()" ><i class="fa fa-check"></i>
													Topup<small>ยืนยันการเติมเงิน</small></button>
                                                </center>

                                            </div>
                                            <div style="padding-top:4vh;display:none"></div>


                                            <hr>
                                            <h4 align="center" class="section-title">Refill information
                                                <small>รายละเอียดการเติมเงิน</small></h4>
                                            <br>
                                            <table border="1" align="center" class="table table-bordered">
                                                <thead class="font14 thead-inverse">
                                                    <tr>
                                                        <th class="text-center">
                                                            <h5 class="section-title"><span
                                                                    style="color:#F00">True</span><span
                                                                    style="color:#F60">money</span></h5>
                                                        </th>
                                                        <th class="text-center">
                                                            <h5 class="section-title"><span style="color:#FFF">GC
                                                                    (เติมเงินปกติ)</span></h5>
                                                        </th>
                                                        <th class="text-center">
                                                            <h5 class="section-title"><span style="color:#FFF">GC
                                                                    (เติมเงินคูณ ';echo $Rategc ;;echo ')</span></h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 50฿</td>
                                                        <td class="text-center">';echo number_format($tmt50) ;;echo ' GC
                                                        </td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt50*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 90฿</td>
                                                        <td class="text-center">';echo number_format($tmt90) ;;echo ' GC
                                                        </td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt90*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 150฿</td>
                                                        <td class="text-center">';echo number_format($tmt150) ;;echo ' GC
                                                        </td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt150*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 300฿</td>
                                                        <td class="text-center">';echo number_format($tmt300) ;;echo ' GC
                                                        </td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt300*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 500฿</td>
                                                        <td class="text-center">';echo number_format($tmt500) ;;echo ' GC
                                                        </td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt500*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="text-bold font13"><span
                                                                style="color:#F00">True</span><span
                                                                style="color:#F60">money</span> 1,000฿</td>
                                                        <td class="text-center">';echo number_format($tmt1000) ;;echo '                                                            GC</td>
                                                        <td class="text-center">
                                                            ';echo number_format($tmt1000*$Rategc) ;;echo ' GC</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
	                                     <br>
                                        <div class="col-md-7">
                                            <h4 align="center" class="section-title">Refill Promotion<small>
                                                    (โปรโมชั่นเติมเงิน)</small> </h4>
                                            <br>
                                            <small>(คลิ๊กที่รูปเพื่อดูรูปขนาดใหญ่)</small>
                                            <a href="#promotion" data-toggle="modal"><img
                                                    src="';echo $photopromo ;;echo '" class="img-rounded" width="100%"
                                                    height="100%"></a>
                                            <br>
                                            <hr>
                                            <div class="alert alert-warning" role="alert">
                                                หากพบปัญหาการเติมเงินโปรดติดต่อผู้ดูแลได้ที่ : <a
                                                    href="';echo $facebookadminl ;;echo '">FacebookAdmin</a>
                                            </div>
                                        </div>
                                    </center>
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
            <img src="';echo $photopromo ;;echo '" class="img-rounded" width="100%" height="100%">
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
</script>'; ?>