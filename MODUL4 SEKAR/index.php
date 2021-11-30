<?php
require_once 'sekar_db_connection.php';
if (isset($_POST['btn_logout'])) {
    session_destroy();
    header('Location: sekar_login.php');
    exit();
}
if (isset($_POST['btn_add'])) {
    if (!isset($_SESSION['logged_in'])) {
        $alert = "Login dulu bang";
        $_SESSION['message'] = $alert;
        header('location: sekar_login.php');
        exit();
    } else {
        $user_id = $_SESSION['id'];
        $nama_tempat = $_POST['nama_tempat'];
        $lokasi = $_POST['lokasi'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];
        if (mysqli_query($conn, "INSERT INTO bookings VALUES ('','$user_id','$nama_tempat','$lokasi','$harga','$tanggal')")) {
            $alert = "Berhasil memesan tiket";
            $_SESSION['message'] = $alert;
            header("Location: index.php");
            exit();
        } else {
            $alert = "Gagal memesan tiket";
            $_SESSION['message'] = $alert;
            header("Location: index.php");
            exit();
        }
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
    <title>Index</title>
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

<body>
<?php
include 'sekar_navbar.php';
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> ' . $_SESSION["message"] . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['message']);
}

$paket = array(
    array("image" => "seribu.jpg", "nama_tempat" => "Kepulauan Seribu", "lokasi" => "Kepulauan Seribu", "deskripsi" => "Kepulauan Seribu adalah salah satu wilayah administrasi yang berada di sebelah utara Kota Jakarta. Meski jumlah pulau yang ada sebenarnya tidak sampai seribu, wilayah ini memiliki sederet pulau-pulau indah dengan daya tariknya sendiri indah dengan daya tariknya sendiri.", "harga" => 3200000),
    array("image" => "borobudur.jpg", "nama_tempat" => "Candi Borobudur", "lokasi" => "Magelang", "deskripsi" => "Candi Borobudur adalah candi Buddha terbesar di dunia. Dibangun pada abad ke-9, Candi Borobudur sekarang menjadi magnet yang mampu menarik jutaan wisatawan setiap tahun.Borobudur sekarang menjadi magnet yang mampu menarik jutaan wisatawan setiap.", "harga" => 1000000),
    array("image" => "parangtritis.jpg", "nama_tempat" => "Pantai Parangtritis", "lokasi" => "Bantul, Yogyakarta", "deskripsi" => "Pantai Parangtritis adalah destinasi wisata yang terletak di Desa Parangtritis, Kretek, Kabupaten Bantul, Daerah Istimewa Yogyakarta. Jaraknya kurang lebih 27 km dari pusat Kota Yogyakarta kurang lebih 27 km dari pusat Kota kurang lebih 27 km dari pusat Kota.", "harga" => 1200000)
);
?>

<div class="container align-content-center p-5">
    <div class="row justify-content-center d-flex">
        <div class="col-10">
            <div class="card rounded-0 border-0">
                <div class="card-header text-center mb-2" style="padding: 85px; background:#8FBC8F">
                    <div class="card-title">
                        <h1>EAD TRAVEL</h1>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row px-3">
                        <?php
                        $i = 1;
                        foreach ($paket as $psn) {
                            ?>
                            <div class="col-4 p-0">
                                <div class="card h-100 rounded-0">
                                    <div class="card-img-top" style="overflow: hidden; height: 300px">
                                        <img src="assets/img/<?php echo $psn['image'] ?>" alt="" class="h-100">
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="card-title">
                                                    <h5><?php echo $psn['nama_tempat'] ?></h5>
                                                </div>
                                                <div class="card-text">
                                                    <p><?php echo $psn['deskripsi'] ?></p>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="card-text">
                                                    <strong>
                                                        <p>Rp. <?php echo $psn['harga'] ?></p>
                                                    </strong>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <form action="index.php" method="post">
                                            <div class="modal fade" id="modaltgl<?= $i ?>" tabindex="-1"
                                                 aria-labelledby="modaltglx" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalFooterLabel">Tanggal
                                                                Perjalanan</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="nama_tempat"
                                                                       value="<?php echo $psn['nama_tempat'] ?>">
                                                                <input type="hidden" name="lokasi"
                                                                       value="<?php echo $psn['lokasi'] ?>">
                                                                <input type="hidden" name="harga"
                                                                       value="<?php echo $psn['harga'] ?>">
                                                                <input placeholder="masukkan tanggal Akhir" type="date"
                                                                       name="tanggal" class="form-control mb-3"
                                                                       name="tgl_akhir" required>
                                                                <div style="margin-left: 360px;">
                                                                    <button class="btn btn-block btn-primary"
                                                                            name="btn_add" type="submit">Tambahkan
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-block btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modaltgl<?= $i++ ?>">
                                                    Pesan Tiket
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>