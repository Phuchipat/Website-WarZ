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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-chevron-right"
                            aria-hidden="true"></span>';echo $server ;;echo ' (';echo $login ;;echo ')</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <center>
									<div class="col-xs-6">
										<div class="panel panel-default">
										  <div class="panel-heading">
											<h3 class="panel-title">ระบบเติมเงิน</h3>
										  </div>
										
									
										  <div class="panel-body">
											<center><h1><a href="?warz=topup" class="btn btn-success btn-block btn-lg" role="button">ไปเติมเงิน</a></h1></center>
										  </div>
										</div>
									</div>
									<div class="col-xs-6">
									<div class="panel panel-default">
										  <div class="panel-heading">
											<h3 class="panel-title">ระบบรับไอเท็ม</h3>
										  </div>
										  <div class="panel-body">
											<center><h1><a href="?warz=getitem" class="btn btn-warning btn-block btn-lg" role="button">ไปรับไอเท็ม</a></h1></center>
										  </div>
										</div>
										
									</div>
                    <div class="col-xs-6">
						<div class="panel panel-warning">
						  <div class="panel-heading">
							<h3 class="panel-title">Game Coins</h3>
						  </div>
						  <div class="panel-body">
							<center><h1>';echo number_format($gc) ;;echo ' GC</h1></center>
						  </div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="panel panel-info">
						  <div class="panel-heading">
							<h3 class="panel-title">Dollar</h3>
						  </div>
						  <div class="panel-body">
							<center><h1>';echo number_format($gd) ;;echo ' Dollar</h1></center>
						  </div>
						</div>
					</div>
					
					<div class="col-xs-12">
						<div class="panel panel-success">
						  <div class="panel-heading">
							<h3 class="panel-title">เวลาออนไลน์</h3>
						  </div>
						  <div class="panel-body">
							<center><h1>0 วัน. 10 ชม. 20 น.  8 วิ.</h1></center>
							<center> <font color="#FF0000">  Time Online Fake! </font></center>
						  </div>
						</div>
					</div>
					
						<div class="col-xs-12">
							<div class="panel panel-default">
							<font color="#00FF00"> 
								<div class="panel-heading"><i class="fa fa-list" aria-hidden="true"></font></i>  ประวัตเติมเงิน 10 รายการล่าสุด</div>
								<div class="panel-body">
									<div class="col-md-12">
									
						<font color="#00FF00">			
										';
$query = ("SELECT TOP 10* FROM ZJJ_HISTOR_TOPUP WHERE customerid='$customer' ORDER BY historid DESC");
$result = sqlsrv_query($conn,$query);
$count = sqlsrv_query( $conn,$query);
if( $result === false ||$count === false) {
die( print_r( sqlsrv_errors(),true));
}
$count = count(sqlsrv_fetch_array( $count,SQLSRV_FETCH_ASSOC));
if($count >0){
	
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate))+14;
$strMinute= date("i",strtotime($strDate))+1;
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}
;echo '				
				
				
								<table class="table table-hover">
										<thead>
											<tr>
											
												<th><font color="#FFFF00"> หมายเลขบัตร</th>
												<th><font color="#FFFF00"> ราคาบัตร</th>
												<th><font color="#FFFF00"> วัน/เวลา</th>
												<th><font color="#FFFF00"> รายละเอียด</th>
												</font>
											</tr>
										</thead>
										
										';while( $row = sqlsrv_fetch_array ( $result,SQLSRV_FETCH_ASSOC)){;echo '										<tbody>
											<tr>
												<td>';echo  $row['card'];;echo '</td>
												<td><b>';echo  number_format($row['topup']);;echo '</b> บาท</td>
												<td>';echo  DateThai(date_format($row['topuptime'],'d-m-Y H:i:s'));;echo 'น.</td>
												<td>';echo  $row['detail'];;echo '</td>
											</tr>
										</tbody>
										</font>		
										
										';
}
}
else
{
echo '<h3 class="text-center"><font color="#FF0000"> ไม่มีรายการเติมเงินใดๆ</h3>';
}
;echo '									</table>
									</div>
								</div>
							</div>
						</div>
						
                                                 <div class="col-xs-12">
						<div class="panel panel-success">
						  <div class="panel-heading">
							<h3 class="panel-title">
							<center>
                                                    (โปรโมชั่นเติมเงิน)</small> </h3>
						  </div>
						  <div class="panel-body">
                                            <br>
   
                                            <a href="#promotion" data-toggle="modal"><img
                                                    src="';echo $photopromo ;;echo '" class="img-rounded" width="100%"
                                                    height="100%"></a>
                                            <br>
                                            
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
'; ?>