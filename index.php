<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LOGIN</title>
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
            <h1>Login </h1>
        </center>
        <form method="POST" action="ceklogin.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" name="email" class="form-control" placeholder="hahahihi@gmail.com" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" name="password" class="form-control" placeholder="*****" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>


            <!-- Submit button -->
            <button type="submit" name="loginuser" class="btn btn-primary btn-block mb-4">Login User</button>

            <button type="submit" name="loginadmin" class="btn btn-primary btn-block mb-4">Login Admin</button>

            <br>


        </form>

        <a class="btn btn-primary" href="register.php" role="button">Registrasi</a>




    </div>
</body>

</html>