<?php 
include "config/setting_CHAR.php";
function updatepoint($id,$cp){
global $conn;
$cp = intval($cp);
$query = sqlsrv_query($conn,"UPDATE UsersData SET CharPoints = CharPoints-'".$cp."' WHERE CustomerID = '".$id."'");
return $query;
}
function additem($id,$itemid,$day,$title){
global $conn;
$query = sqlsrv_query($conn,"EXEC FN_AddItemToUser $id,$itemid,$day;");
$query2 = sqlsrv_query($conn,"INSERT INTO[ZJJ_HISTOR_CHAR_2019] VALUES (".$id.", ".$itemid.", GETDATE()+".$day.", ".$day.", N'$title' );");
return true;
}
$id = $_GET["id"];
if (isset($id) AND !empty($id)){
if ($buyitem[$id]){
if (intval($cp) >= intval($buyitem[$id]["cp"])){
if(updatepoint($customer,$buyitem[$id]["cp"])){
echo '<script>alert("ทำการเช่า '.$buyitem[$id]["title"].' เรียบร้อยแล้ว วันใช้งาน '.$buyitem[$id]["day"].' วัน");location="?warz=rentchar";</script>';
additem($customer,$buyitem[$id]["itemid"],$buyitem[$id]["day"],$buyitem[$id]["title"]);
}else{
echo '<script>alert("Error Cannot Update CharPoints");location="?warz=home";</script>';
}
}else{
echo '<script>alert("จำนวน CharPoints ไม่พอซื้อไอเทมนี้ กรุณาเติม CharPoints");location="?warz=topupchar";</script>';
}
}else{
echo '<script>alert("ไม่มีตัวละครที่ต้องการจะเช่า");location="?warz=rentchar";</script>';
}
}
;echo '';include "pages/menu.php";;echo '<div class="container">
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
						 <div class="text-center" style="padding-top:3vh;">
                            จำนวน CharPoints คงเหลือ <span class="label label-success">';echo number_format($cp);;echo '</span> CP
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
                                                                <p><a href="?warz=rentchar&id=';echo $rows;;echo '"
                                                                        onclick="var txt; var r = confirm(\'คุณต้องการเช่าตัวละครนี้ใช่หรือไม่ !\'); if (r == true) { txt = \'You pressed OK!\'; }else{ return false; }"
                                                                        class="btn btn-primary btn-block"
                                                                        role="button">เช่าตัวละครนี้</a></p>
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
</div>'; ?>