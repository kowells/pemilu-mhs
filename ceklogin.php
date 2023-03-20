<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];
$pass = md5($password);

if (isset($_POST['loginuser'])) {
    $query = mysqli_query($sambung, "SELECT * FROM login WHERE email = '$email'
    && password = '$pass'") or die(mysqli_error($sambung));
} else if (isset($_POST['loginadmin'])) {
    $query = mysqli_query($sambung, "SELECT * FROM loginadm WHERE email = '$email'
    && password = '$pass'") or die(mysqli_error($sambung));
}

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $pass;
    if (isset($_POST['loginuser'])) {
        header("location:form.php");
    } else if (isset($_POST['loginadmin'])) {
        header("location:list.php");
    }
} else {
    header("location:login.php?pesan=gagal");
}
