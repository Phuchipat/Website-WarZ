<?php 
/*******************  ระบบเช่าตัวละคร *******************/
$buyitem = array(
    array("test"=>1),//ไม่ต้องลบอันนี้
    
    //====================== ตัวอย่าง การตั้งค่าของระบบเช่าตัวละคร
    //array("gc"=>"100", << ส่วนนี้คือ ราคาเช่า 100 cp ก็ใส่ 100
    //"title"=>"Medkit", << ส่วนนี้คือชื่อ ตัวละคร นั้นๆ
    //"image"=>"http://img.online-station.net/gamewiki/infestation/medicineitem/3/1002_sss_3.png", << ส่วนนี้คือลิงค์รูปภาพ
    //"itemid"=>"101304", << ส่วนนี้คือ ItemID ของตัวละคร
    //"day"=>"50"), << ส่วนนี้คือ จำนวน วันเช่าตัวละคร
    //======================
	
    array("cp"=>"50",
    "title"=>"KenKanekiGod",
    "image"=>"assets/image/char/600022.png",
    "itemid"=>"600022",
    "day"=>"3"),
    
    array("cp"=>"90",
    "title"=>"KenKanekiGod",
    "image"=>"assets/image/char/600022.png",
    "itemid"=>"600022",
    "day"=>"6"),
    
    array("cp"=>"150",
    "title"=>"KenKanekiGod",
    "image"=>"assets/image/char/600022.png",
    "itemid"=>"600022",
    "day"=>"12"),

    array("cp"=>"300",
    "title"=>"KenKanekiGod",
    "image"=>"assets/image/char/600022.png",
    "itemid"=>"600022",
    "day"=>"365"),
	
	 array("cp"=>"50",
    "title"=>"Celty",
    "image"=>"assets/image/char/600029.png",
    "itemid"=>"600029",
    "day"=>"3"),
    
    array("cp"=>"90",
    "title"=>"Celty",
    "image"=>"assets/image/char/600029.png",
    "itemid"=>"600029",
    "day"=>"6"),
    
    array("cp"=>"150",
    "title"=>"Celty",
    "image"=>"assets/image/char/600029.png",
    "itemid"=>"600029",
    "day"=>"12"),

    array("cp"=>"300",
    "title"=>"Celty",
    "image"=>"assets/image/char/600029.png",
    "itemid"=>"600029",
    "day"=>"365"),
    
    ); // ห้ามลบ และห้ามวางหลังตัวนี้ให้วางภายในของตัวนี้เท่านั้น
    unset($buyitem[0]);// ห้ามลบ
/********************************/
?>