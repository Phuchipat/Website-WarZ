<?php
$conn = connectDb();
$sql_customer= "SELECT CustomerID FROM Accounts WHERE email='$email'";
$sql_customer = sqlsrv_query( $conn, $sql_customer);
if( $sql_customer === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_customer ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$customer = sqlsrv_get_field( $sql_customer, 0);

//lastjoineddate
$sql_lastjoineddate= "SELECT lastjoineddate FROM UsersData WHERE CustomerID='$customer'";
$sql_lastjoineddate = sqlsrv_query( $conn, $sql_lastjoineddate);
if( $sql_lastjoineddate === true ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_lastjoineddate ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$lastjoineddate = sqlsrv_num_rows( $stmt );


//GC
$sql_gc= "SELECT GamePoints FROM UsersData WHERE CustomerID='$customer'";
$sql_gc = sqlsrv_query( $conn, $sql_gc);
if( $sql_gc === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_gc ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$gc = sqlsrv_get_field( $sql_gc, 0);

//Dollar
$sql_gd= "SELECT GameDollars FROM UsersData WHERE CustomerID='$customer'";
$sql_gd = sqlsrv_query( $conn, $sql_gd);
if( $sql_gd === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_gd ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$gd = sqlsrv_get_field( $sql_gd, 0);


//CharPoints
$sql_cp= "SELECT CharPoints FROM UsersData WHERE CustomerID='$customer'";
$sql_cp = sqlsrv_query( $conn, $sql_cp);
if( $sql_cp === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_cp ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$cp = sqlsrv_get_field( $sql_cp, 0);


//trade
$sql_amtta= "SELECT amounttopupall FROM UsersData WHERE CustomerID='$customer'";
$sql_amtta = sqlsrv_query( $conn, $sql_amtta);
if( $sql_amtta === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_amtta ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$amta = sqlsrv_get_field( $sql_amtta, 0);

//RenamePoints
$sql_rnp= "SELECT RenamePoints FROM UsersData WHERE CustomerID='$customer'";
$sql_rnp = sqlsrv_query( $conn, $sql_rnp);
if( $sql_rnp === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_rnp ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$rn = sqlsrv_get_field( $sql_rnp, 0);

//RecolorPoints
$sql_rc= "SELECT RecolorPoints FROM UsersData WHERE CustomerID='$customer'";
$sql_rc = sqlsrv_query( $conn, $sql_rc);
if( $sql_rc === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_rc ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$rc = sqlsrv_get_field( $sql_rc, 0);

//amountvip
$sql_amountvip= "SELECT amountvip FROM UsersData WHERE CustomerID='$customer'";
$sql_amountvip = sqlsrv_query( $conn, $sql_amountvip);
if( $sql_amountvip === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_amountvip ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$amountvip = sqlsrv_get_field( $sql_amountvip, 0);

//nkzVIP
$sql_VIPsNum= "SELECT nkzVIP FROM UsersData WHERE CustomerID='$customer'";
$sql_VIPsNum = sqlsrv_query( $conn, $sql_VIPsNum);
if( $sql_VIPsNum === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_VIPsNum ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$VIPsNum = sqlsrv_get_field( $sql_VIPsNum, 0);

//GetitemYoutube
$sql_getyt= "SELECT GetitemYoutube FROM UsersData WHERE CustomerID='$customer'";
$sql_getyt = sqlsrv_query( $conn, $sql_getyt);
if( $sql_getyt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_getyt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$getyt = sqlsrv_get_field( $sql_getyt, 0);

// คนอนนไลน์
$sql = "SELECT uc.LastUpdateDate, uc.Gamertag, uc.CustomerID, ud.CustomerID, ud.IsDeveloper, ud.AccountType From UsersChars as uc JOIN UsersData as ud ON uc.CustomerID = ud.CustomerID
WHERE DATEDIFF(MINUTE, uc.LastUpdateDate, GETDATE()) <= 1";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sql , $params, $options );

$useronline = sqlsrv_num_rows( $stmt );


$sql_lastIP= "SELECT LoginIP FROM LoginSessions WHERE CustomerID='$customer'";
$sql_lastIP = sqlsrv_query( $conn, $sql_lastIP);
if( $sql_lastIP === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_lastIP ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$lastIP = sqlsrv_get_field( $sql_lastIP, 0);


$sql_lastPlay= "SELECT lastgamedate FROM UsersData WHERE CustomerID='$customer'";
$sql_lastPlay = sqlsrv_query( $conn, $sql_lastPlay);
if( $sql_lastPlay === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $sql_lastPlay ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$lastPlay = sqlsrv_get_field( $sql_lastPlay, 0);


$accStatus = "SELECT AccountStatus FROM Accounts WHERE CustomerID='$customer'";
$accStatus = sqlsrv_query( $conn, $accStatus);
if( $accStatus === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $accStatus ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$accStatus  = sqlsrv_get_field( $accStatus, 0);


$accStatusban = "SELECT AccountStatus FROM UsersData WHERE CustomerID='$customer'";
$accStatusban = sqlsrv_query( $conn, $accStatusban);
if( $accStatusban === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( sqlsrv_fetch( $accStatusban ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$accStatusban  = sqlsrv_get_field( $accStatusban, 0);


// จบ
?>
