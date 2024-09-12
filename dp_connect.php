<?php

$host = 'localhost';
$dp = 'student';
$username = 'root';
$password = '';

$connect = mysqli_connect($host , $username , $password , $dp);

if(!$connect){
    mysqli_connect_error();
}