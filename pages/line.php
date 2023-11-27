<?php
  function line_alert($email, $amount) {
    ini_set('display_errors', 1);
	  ini_set('display_startup_errors', 1);
	  error_reporting(E_ALL);
	  date_default_timezone_set("Asia/Bangkok");

  	$sToken = "fXc0ynsOJfyvG0cGJZkOiSDFhAhQEsTSb4ehODep5MG";
    $sMessage = '';
	$sMessage .= 'TOPUP!! :';
    $sMessage .= 'มีรายการเติมเงินใหม่';
    $sMessage .= 'ราคา: '.$amount.' บาท';
    $sMessage .= 'ผู้เล่น: '.$email;


    $chOne = curl_init();
  	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  	curl_setopt( $chOne, CURLOPT_POST, 1);
  	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage);
  	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
  	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  	$result = curl_exec( $chOne );

    //Result error
  	if(curl_error($chOne)) {
      echo 'error:' . curl_error($chOne);
    } else {
  		$result_ = json_decode($result, true);
  		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
  	}
	   curl_close( $chOne );
  }
?>
