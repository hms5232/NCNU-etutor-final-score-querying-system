<?php
$host = 'localhost';
$user = ''; //username
$pass = ''; //password
$db = ''; //database name
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with SQL connection'); //跟SQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
?>