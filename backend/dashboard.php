<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
require 'db_connect.php';

echo "Welcome, " . $_SESSION['username'] . "!";
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>
