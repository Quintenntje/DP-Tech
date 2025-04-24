<?php
$serverName="localhost";
$DBUsername ="root";
$DBPassword ="usbw";
$DBName="dp-tech";

$conn = mysqli_connect($serverName, $DBUsername, $DBPassword, $DBName);

if(!$conn){
    die("Connection failed" . mysqli_connect_error());

}

?>