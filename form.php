<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>FORM</title>
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
            <h1>INPUT DATA PENDAFTAR</h1>
        </center>
        <form method="POST" action="inputdataform.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="nama" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="number" class="form-control" placeholder="123200XXX" name="nim">
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



</body>

</html>