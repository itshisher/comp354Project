<?php


$serverName = "localhost";
$DBUserName = "root";
$DBPassword = "";
$DBName = "bookappdb";

$connection = mysqli_connect($serverName, $DBUserName, $DBPassword, $DBName);

if(!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}