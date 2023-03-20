<?php
include "koneksi.php";
include "AES.php";

if (isset($_POST["submit"])) {
    $nama_user = $_POST['nama'];
    $nama_user = base64_encode(str_rot13($nama_user));
    $nim = $_POST['nim'];
    $nim = base64_encode($nim);

    $file_tmpname   = $_FILES['file']['tmp_name']; // untuk mendapatkan nama temporary file
    //untuk nama file url
    $file           = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $new_file_name  = strtolower($file);
    $final_file     = str_replace(' ', '-', $new_file_name);
    //untuk nama file
    $filename       = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $new_filename   = strtolower($filename);
    $finalfile      = str_replace(' ', '-', $new_filename);
    $size           = filesize($file_tmpname);
    $size2          = (filesize($file_tmpname)) / 1024;
    $info           = pathinfo($final_file);
    $file_source    = fopen($file_tmpname, 'rb');
    $ext            = $info["extension"]; // untuk mendapatkan jenis ekstensi file

    if ($ext == "pdf") {
    } else {
        echo ("<script language='javascript'>
          window.location.href='form.php';
          window.alert('Maaf, file anda bukan pdf');
          </script>");
        exit();
    }

    if ($size2 > 3084) {
        echo ("<script language='javascript'>
          window.location.href='form.php';
          window.alert('Maaf, file tidak bisa lebih besar dari 3MB.');
          </script>");
        exit();
    }


    $sql1 = "INSERT INTO form VALUES ('','$nama_user','$nim','','$final_file' )";
    $query1 = mysqli_query($sambung, $sql1) or die(mysqli_error($sambung));

    $sql2   = "select * from form where ktm =''";
    $query2  = mysqli_query($sambung, $sql2) or die(mysqli_error($sambung));

    $url   = $finalfile . ".rda";
    $file_url = "file_enkripsi/$url";

    $sql3   = "UPDATE form SET ktm ='$file_url' WHERE ktm=''";
    $query3  = mysqli_query($sambung, $sql3) or die(mysqli_error($sambung));

    $file_output        = fopen($file_url, 'wb');

    $mod    = $size % 16;
    if ($mod == 0) {
        $banyak = $size / 16;
    } else {
        $banyak = ($size - $mod) / 16;
        $banyak = $banyak + 1;
    }

    $key = "abcdefghijuklmno0123456789012345";
    if (is_uploaded_file($file_tmpname)) {
        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);
        $aes = new AES($key);

        for ($bawah = 0; $bawah < $banyak; $bawah++) {
            $data    = fread($file_source, 16);
            $cipher  = $aes->encrypt($data);
            fwrite($file_output, $cipher);
        }
        fclose($file_source);
        fclose($file_output);

        echo ("<script language='javascript'>
          window.location.href='form.php';
          window.alert('Joss masyuk');
          </script>");
    } else {
        echo ("<script language='javascript'>
          window.location.href='form.php';
          window.alert('Gagal dek');
          </script>");
    }
}
