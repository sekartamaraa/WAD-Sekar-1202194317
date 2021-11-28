<?php
require_once 'sekar_db_connection.php';
if (!isset($_SESSION['logged_in'])) {
    header('location: sekar_login.php');
}
if (isset($_POST['btn_logout'])) {
    session_destroy(); header('Location: sekar_login.php'); exit();
}
if (isset($_POST['btn_delete'])) {
    $userid = $_POST['btn_delete'];
    if (mysqli_query($conn, "DELETE from bookings WHERE id = '$userid'")) {
        $alert = "Berhasil dihapus!";
        $_SESSION['message'] = $alert;
        header("Location: sekar_bookings.php");
        exit();
    } else {
        $alert = "Gagal dihapus!";
        $_SESSION['message'] = $alert;
        header("Location: sekar_bookings.php");
        exit();
    }
}
$id = $_SESSION['id'];
$paket1 = mysqli_query($conn, "SELECT * from bookings WHERE user_id = '$id'");
$paket1->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body{
        background: #fef9e6;
        }
    </style>
</head>

<body>
    <?php
    include 'sekar_navbar.php';
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $_SESSION["message"] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="container align-content-center pt-0 pb-0 pr-0 pl-0 mt-5">
        <div class="row justify-content-center d-flex">
            <div class="col-12 mt-5">
                <div class="bg-light p-2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tempat</th>
                                <th>Lokasi</th>
                                <th>Tanggal Perjalanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($paket1 as $item) {
                                $i++;
                                echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . $item["nama_tempat"] . '</td>
                            <td>' . $item["lokasi"] . '</td>
                            <td>' . $item["tanggal"] . '</td>
                            <td>Rp. ' . $item["harga"] . '</td>
                            <form action="sekar_bookings.php" method="post">
                                <td><button class="btn btn-danger" type="submit" name="btn_delete"
                                value="' . $item["id"] . '">Hapus</button></td>
                            </form>   
                        </tr>  
                        ';
                            }
                            ?>
                        </tbody>
                        <tfooter>
                            <tr>
                                <th colspan="2">Total</th>
                                <?php
                                $total = mysqli_query($conn, "SELECT SUM(harga) as total from bookings WHERE user_id = $id");
                                $paket = $total->fetch_array();
                                ?>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="3" class="text-right">Rp. <?php echo $paket['total'] ?></th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:386px">
        <?php
        include 'sekar_footer.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
