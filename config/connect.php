<?php

    
    function connectDb()
    {
        $serverName = "191.101.214.149";
        $connectionInfo = array( "Database"=>"WarZ", "UID"=>"sa", "PWD"=>"", "MultipleActiveResultSets"=>true, "CharacterSet"=>'UTF-8' );// ไม่ต้องแก้ไข
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        return $conn;
    }
	
	$WarZDB = "WarZ";
	
	$ip_port = "103.91.206.182,1433";
    $userName = 'sa';
    $userPassword = '@donut001@'; 
    $dbName = "WarZ";
	
	$pdo_conn = new PDO("sqlsrv:server=$ip_port ; Database = $dbName", $userName, $userPassword);
	$pdo_conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);

    function js_alert($message,$type='info',$redirect='./'){
        echo '
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <body>
        <script>
            swal("", "'.$message.'", "'.$type.'").then(function(){
                window.location="'.$redirect.'";
            });
        </script>
        </body>
        ';
    }
	
	function js_alert2($head,$message,$type='info',$redirect='./'){
        echo '
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <body>
        <script>
            swal("'.$head.'", "'.$message.'", "'.$type.'").then(function(){
                window.location="'.$redirect.'";
            });
        </script>
        </body>
        ';
    }
    
?>