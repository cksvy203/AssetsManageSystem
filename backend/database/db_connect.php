<?php
// db_connect.php

// 데이터베이스 연결 설정
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// 데이터베이스 연결 생성
$mysqli = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
