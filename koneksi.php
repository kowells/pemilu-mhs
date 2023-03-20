<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "kripto";

$sambung = new mysqli($hostname, $username, $password, $database);

if ($sambung->connect_error) {
    die('Maaf koneksi gagal: ' . $connect->connect_error);
}
