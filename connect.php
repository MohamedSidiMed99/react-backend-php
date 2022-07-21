<?php

$host = "localhost";
$name = "root";
$pass = "";
$dbname = "react";

$con = mysqli_connect($host,$name,$pass,$dbname);

if(!$con){
    echo "connected";
}




?>