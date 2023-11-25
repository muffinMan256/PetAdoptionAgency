<?php


$host = "localhost";
$userName = "root";
$passWord = "";
$dbName = "be20_cr5_animal_adoption_sassuandrei";

$connection = mysqli_connect($host, $userName, $passWord, $dbName);

if(!$connection) {
    echo "ERROR";
}