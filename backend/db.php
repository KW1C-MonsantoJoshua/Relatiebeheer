<?php
$servername = "localhost";
$username = "relatebeheer";
$password = "Z1HaCog5gh6d%efu";
$db = "relatebeheer";

// Create connection
$mysqli = new mysqli("$servername", "$username", "$password", "$db");
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function getSQLConnect()
{
    return $mysqli;
}