<?php


$databaseHost = 'localhost';
$databaseName = 'db_login';
$databaseUsername = 'root';
$databasePassword = '';

$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
// if(!$connection){

// 	die ("connection failed :" .mysqli_connect_error());
// }
// else{
// 	echo " Connection successfully";
// }

?>
