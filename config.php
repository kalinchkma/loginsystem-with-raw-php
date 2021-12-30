<?php
//define host
define('DB_HOST','localhost',true);
define('DB_USER', 'root',true);
define('DB_PASS', '',true);
define('DB_NAME', 'project01',true);


//make connection
try{
	$dbcon = new mysqli(db_host,DB_USER,DB_PASS,db_name);
	// mysqli_connect(db_host,DB_USER,DB_PASS,db_name);

	mysqli_set_charset($dbcon,'utf8');
	// echo "DataBase connection";
}catch(Exception $e){
	echo "System busy Please try again later";
	//system message
	// echo 'Error is: '.$e->getMessage();
}catch(Error $e){
	echo "System error: ".$e->getMessage();
}



?>