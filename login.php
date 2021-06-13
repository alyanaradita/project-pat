<?php
include 'config/koneksi.php';
include 'library/controller.php';

$tabel = 'tbl_user';
@$username = $_POST['user'];
@$password = $_POST['pass'];
@$akses    = $_POST['akses'];

$go = new Controller();

if (isset($_POST['login'])) {
    $go->login($con, $tabel, $username, $password, $akses);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body style="background-image: url('foto/bglogin.jpg'); background-size: cover;" >
    <div class="container mt-4">
        <div class="card d-inline-flex p-2 bd-highlight position-absolute top-50 start-50 translate-middle" >
            <div class="card-body">
            <form action="" method="POST">
                <h4 align="center">Masukan Akun</h4>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleFormControlInput1"required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Akses</label>
                    <select class="form-control input-lg" name="akses" required>
                        <option selected></option>
                        <option>admin</option>
                        <option>manager</option>
                        <option>kasir</option>
                    </select>
                </div>
                <button class="btn btn-outline-success" type="submit" name="login" value="LOGIN">Login</button>
            </div>
        </div>
        </form>
    </div>
</body>