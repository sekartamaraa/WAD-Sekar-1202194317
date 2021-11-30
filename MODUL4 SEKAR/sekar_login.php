<?php
require_once 'sekar_db_connection.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}
$remember = false;
if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['passw'];
    $remember = isset($_POST['remember']);
    $logged = mysqli_query($conn, "SELECT * from users WHERE email = '$email' AND password = '$password'");
    if ($logged->num_rows >= 1) {
        $data_user = $logged->fetch_array();
        if ($remember) {
            setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/');
            setcookie('password', $password, time() + (60 * 60 * 24 * 5), '/');
        }
        $_SESSION['nama'] = $data_user['nama'];
        $_SESSION['id'] = $data_user['id'];
        $_SESSION['logged_in'] = TRUE;
        $alert = "Berhasil Login";
        $_SESSION['message'] = $alert;
        header('Location: index.php');
        exit();
    } else {
        $alert = "Gagal Login";
        $_SESSION['message'] = $alert;
        header('Location: sekar_login.php');
        exit();
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body {
            background: #fef9e6;
        }
    </style>
</head>

<body class="body-default">
<?php
include 'sekar_navbar.php';
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ' . $_SESSION["message"] . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['message']);
}
?>
<div class="container align-content-center p-5">
    <div class="row justify-content-center">
        <div class="col-5  justify-content-center align-middle">
            <div class="card">
                <div class="card-body px-5">
                    <h4 class="text-decoration-none">
                        <center>Login</center>
                    </h4>
                    <hr/>
                    <?php
                    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                        $saved_email = $_COOKIE['email'];
                        $saved_password = $_COOKIE['password'];
                    } else {
                        $saved_email = "";
                        $saved_password = "";
                    }
                    ?>
                    <form action="sekar_login.php" method="post">
                        <div class="form-group mb-3">
                            <label for="e-mail">Email</label>
                            <input type="email" required class="form-control" name="email"
                                   placeholder="Masukkan Alamat E-mail" id="e-mail" value="<?php echo $saved_email ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="passw">Kata Sandi</label>
                            <input type="password" required class="form-control" name="passw"
                                   placeholder="Kata Sandi Anda" id="passw" value="<?php echo $saved_password ?>">
                        </div>
                        <div class="form-group mb-3">
                            <input type="checkbox" class="form-check-inline" name="remember" id="remember" value="true">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="form-group text-center mb-3 d-grid gap-2 col-3 mx-auto">
                            <button class="btn btn-primary" name="btn_login" type="submit">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <p class="d-inline">Anda belum punya akun? </p><a href="sekar_register.php">Register </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 190px;">

    <?php
    include 'sekar_footer.php';
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>
