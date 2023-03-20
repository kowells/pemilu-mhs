<?php
include "koneksi.php";


$email_user = $_POST['emailreg'];
$passreg = $_POST['passreg'];
$passreg = md5($passreg);



$query = mysqli_query($sambung, "INSERT INTO login VALUES ('','$email_user','$passreg')")
    or die(mysqli_error($sambung));

if ($query) {
    header("location:index.php");
} else {
    echo "proses input gagal";
}
