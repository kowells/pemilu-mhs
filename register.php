<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>REGISTER</title>
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
        <div>
            <h1>Register Akun</h1>
        </div>
        <div>
            <form method="POST" action="inputdataregister.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" name="emailreg" placeholder="nama">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="passreg" placeholder="123200XXX">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>