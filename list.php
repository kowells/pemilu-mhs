<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>LIST </title>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="foto_ktm/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Pemilihan Umum Raya Mahasiswa
            </a>
        </div>
    </nav>
</head>

<body>
    <div class="container">
        <center>
            <h1>Data Mahasiswa</h1><br><br>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">KTM</th>

                    </tr>
                </thead>

                <?php
                include 'koneksi.php';
                include 'AES.php';
                $query = "SELECT * from form";
                $sql       = mysqli_query($sambung, $query);
                if (mysqli_num_rows($sql) > 0) {
                    $query1     = "SELECT * FROM form";
                    $sql1       = mysqli_query($sambung, $query1);
                    $data       = mysqli_fetch_row($sql1);

                    $file_path  = $data['3'];
                    $file_name = $data['4'];
                    $key = "abcdefghijuklmno0123456789012345";
                    $file_size  = filesize($file_path);

                    $mod        = $file_size % 16;

                    $aes        = new AES($key);
                    $fopen1     = fopen($file_path, "rb");
                    $plain      = "";
                    $cache      = "file_dekripsi/$file_name";
                    $fopen2     = fopen($cache, "wb");

                    if ($mod == 0) {
                        $banyak = $file_size / 16;
                    } else {
                        $banyak = ($file_size - $mod) / 16;
                        $banyak = $banyak + 1;
                    }

                    ini_set('max_execution_time', -1);
                    ini_set('memory_limit', -1);
                    for ($bawah = 0; $bawah < $banyak; $bawah++) {

                        $filedata    = fread($fopen1, 16);
                        $plain       = $aes->decrypt($filedata);
                        fwrite($fopen2, $plain);
                    }
                    $_SESSION["download"] = $cache;
                }


                while ($data = mysqli_fetch_array($sql)) {
                    $namadec = str_rot13(base64_decode($data['nama']));
                    $nimdec = base64_decode($data['nim']);
                ?>
                    <tr>
                        <td><?php echo $namadec; ?></td>
                        <td><?php echo $nimdec ?></td>
                        <td><?php echo $file_name; ?></td>

                    <?php }
                    ?>
                    </tr>

            </table>
        </center>
    </div>


</body>

</html>