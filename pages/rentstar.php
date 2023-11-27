<?php 
    include "config/setting_STAR.php";
    function updatepoint($id, $cp){
        global $conn;
        $cp = intval($cp);
        $query = sqlsrv_query($conn,"UPDATE UsersData SET CharPoints = CharPoints - '".$cp."' WHERE CustomerID = '".$id."'");
        return $query;
    }

    function rentstar($id, $day, $type){
        global $conn;
        $query = sqlsrv_query($conn,"EXEC FN_RentStar $id, $type, $day;");
        return $query;
    }

    $id = $_GET["id"];
    if (isset($id) AND !empty($id)) {
        if ($buyitem[$id]) {
            if (intval($cp) >= intval($buyitem[$id]["cp"])) {
                if(updatepoint($customer, $buyitem[$id]["cp"])) {
                    if(rentstar($customer, $buyitem[$id]["day"], $buyitem[$id]["type"])) {
                        js_alert2("สำเร็จ", "ทำการเช่า ".$buyitem[$id]["title"]." จำนวน ".$buyitem[$id]["day"]." วันเรียบร้อยแล้ว", "success");
                    } else {
                        js_alert2("ผิดพลาด", "ไม่สามารถเช่ายศได้", "error");
                    }
                } else {
                    js_alert2("ผิดพลาด", "ไม่สามารถอัพเดต CP ได้", "error");
                }
            } else {
                js_alert2("ผิดพลาด", "จำนวน CP ไม่พอซื้อไอเทมนี้ กรุณาเติม CP", "error");
            }
        } else {
            js_alert2("ผิดพลาด", "ไม่มียศที่จะเช่า", "error");
        }
    }

    include "pages/menu.php";
    echo '
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
                                aria-hidden="true"></span>';echo $server ;echo ' (';echo $login ;echo ')</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="text-center" style="padding-top:3vh;">
                                จำนวน CharPoints คงเหลือ <span class="label label-success">';echo number_format($cp);echo '</span> CP
                                </br></br>
                            </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel-body">
                                            <center>
                                                <div class="col-sm-12" data-effect="slide-bottom">
                                                    <div class="row">
                                                        ';foreach ($buyitem as $rows =>$value){;echo '                                                    <div class="col-sm-4">
                                                            <div class="thumbnail">
                                                                <img src="';echo $value["image"];;echo '" width="50%">
                                                                <div class="caption">
                                                                    <h6>';echo $value["title"];;echo '</h6>
                                                                    <p><b>จำนวน : ';echo $value["day"];;echo ' วัน</b></p>
                                                                    <p><b>';echo $value["cp"];;echo ' CP</b></p>
                                                                    <p><a href="?warz=rentstar&id=';echo $rows;;echo '"
                                                                            onclick="var txt; var r = confirm(\'คุณต้องการเช่า ';echo $value["title"];echo ' จำนวน ';echo $value["day"];echo ' วันใช่หรือไม่ !\'); if (r == true) { txt = \'You pressed OK!\'; }else{ return false; }"
                                                                            class="btn btn-primary btn-block"
                                                                            role="button">เช่ายศนี้</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        ';};echo '                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--login form-->
                </div>
            </div>
        </div>
    </div>'; 
?>