<?php

  /* db name vip */
  $dbvip = "nkzVIP"; //ตาราง db

  /*******************  VIP *******************/
  $getvip = array(
    array("test"=>1),//ไม่ต้องลบอันนี้
  	/*                                                 จำนวนเติมสะสม		ชื่อVIPที่แสดง				เลขVIP	รายละเอียดของVIP*/
	
    array(
      "amountvip"=>"50",
      "title"=>"VIP1",
      "rowvip"=>"1",
      "detail"=>"  วิ่ง 1% ",
      "image"=>"assets/img/vip1.png"
    ),
  	array(
      "amountvip"=>"150",
      "title"=>"VIP3",
      "rowvip"=>"3",
      "detail"=>" วิ่ง 3% ถึก 1% ",
      "image"=>"assets/img/vip3.png"
    ),
  	array(
      "amountvip"=>"300",
      "title"=>"VIP5",
      "rowvip"=>"5",
      "detail"=>" วิง 3% ถึก 2% รี 2% ",
      "image"=>"assets/img/vip5.png"
    ),
  	array(
      "amountvip"=>"500",
      "title"=>"VIP7",
      "rowvip"=>"7",
      "detail"=>"วิง 4% ถึก 3% รี 3% ",
      "image"=>"assets/img/vip7.png"
    ),
  	array(
      "amountvip"=>"1000",
      "title"=>"VIP10",
      "rowvip"=>"10",
      "detail"=>"วิง 5% ถึก 5% รี 5% ",
      "image"=>"assets/img/vip10.png"
    ),


      ); // ห้ามลบ และห้ามวางหลังตัวนี้ให้วางภายในของตัวนี้เท่านั้น
      unset($getvip[0]);// ห้ามลบ
  /********************************/

?>
