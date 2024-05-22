<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 사용자가 입력한 정보 가져오기
    $username = $mysqli->real_escape_string($_POST['username']);
    $id = $mysqli->real_escape_string($_POST['id']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user';  // 기본값으로 일반 사용자로 설정
    $department = $mysqli->real_escape_string($_POST['department']);
    $position = $mysqli->real_escape_string($_POST['position']);

    // 데이터베이스에 사용자 정보 저장하기
    $sql = "INSERT INTO users (username, id, password, role, department, position) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $username, $id, $password, $role, $department, $position);

    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // 연결과 명령문 종료
    $stmt->close();
}
$mysqli->close();
?>
