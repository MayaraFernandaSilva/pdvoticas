<?php
$host = "localhost";
$user = "root";
$pass = "123789456";
$db   = "otica";


$con = mysql_connect($host, $user, $pass) or die(mysql_error());
$conn = mysqli_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

?>