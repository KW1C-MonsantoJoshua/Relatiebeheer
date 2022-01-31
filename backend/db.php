<?php
//$servername = "localhost";
//$username = "relatebeheer";
//$password = "Z1HaCog5gh6d%efu";
//$db = "relatebeheer";
//
//// Create connection
//$mysqli = new mysqli("$servername", "$username", "$password", "$db");
//$con = mysqli_connect($servername, $username, $password, $db);
//
//// Check connection
//if (!$con) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//
//function getSQLConnect()
//{
//    return $mysqli;
//}
$host="81.169.139.193";
$port=9999;
$socket="";
$user="qccstest";
$password="";
$dbname="relatebeheer";

$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
