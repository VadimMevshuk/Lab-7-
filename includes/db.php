<?php
$host = 'localhost';
$user = 'root';
$password = '9876543210';
$dbname = 'events';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
