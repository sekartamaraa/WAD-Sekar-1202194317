<?php
require_once 'sekar_db_connection.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}

$alert = '';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $insert = mysqli_query($conn, "INSERT INTO users VALUES ('','$nama','$email','$password','$no_hp')");
    if ($insert) {
        $alert = "Berhasil Registrasi"; $_SESSION['message'] = $alert; header("Location: sekar_register.php"); exit();
    } else {
        $alert = "Gagal Registrasi"; $_SESSION['message'] = $alert; header("Location: sekar_register.php"); exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body{
        background: #fef9e6;
        }
    </style>
</head>

<body class="body-default">

<?php
include 'sekar_navbar.php';
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> ' . $_SESSION["message"] . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['message']);
}
?>

<div class="container align-content-center p-5">
    <div class="row justify-content-center d-flex">
        <div class="col-5  justify-content-center align-middle">
            <div class="card">
                <div class="card-body px-5 pt-4">
                <h4 class="text-decoration-none"><center>Register</center></h4>
                <hr/>
                    <form action="sekar_register.php" method="post">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" required class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group mb-3">
                            <label for="e-mail">Email</label>
                            <input type="email" required class="form-control" name="email" id="e-mail" placeholder="Masukkan Alamat E-mail">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" required class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="passw">Kata Sandi</label>
                            <input type="password" required class="form-control" name="password" id="passw" placeholder="Kata Sandi Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="conf_passw">Konfirmasi Kata Sandi</label>
                            <input type="password" required class="form-control" name="conf_passw" id="conf_passw" placeholder="Konfirmasi Kata Sandi Anda">
                        </div>
                        <div class="form-group mb-3 text-center d-grid gap-2 col-3 mx-auto">
                            <button class="btn btn-primary" name="submit" type="submit">Daftar</button>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <p class="d-inline">Anda sudah punya akun? </p><a href="sekar_login.php" class="">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include 'sekar_footer.php';
    ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script !src="">
    var new_password = document.getElementById("passw")
        , confirm_password = document.getElementById("conf_passw");

    function validatePassword() {
        if (new_password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwordnya ga sama!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    new_password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>
