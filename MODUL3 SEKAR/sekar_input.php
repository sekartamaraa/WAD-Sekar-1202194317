<?php
require_once "sekar_db.php";
$penulis = "Sekar_1202194317";
if (isset($_POST['submit'])) {
    $judul = $_POST['judul_buku'];
    $pb = $_POST['penulis_buku'];
    $terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = $_POST['tag'];
    $ceks = "";
    foreach ($tag as $cek) {
        $ceks .= $cek . ",";
    }
    $tmp = $_FILES['file_upload']['tmp_name'];
    $gambar = rand(0, 9999) . $_FILES['file_upload']['name'];
    $ukuran = $_FILES['file_upload']['size'];
    $tipe = $_FILES['file_upload']['type'];
    $folder = "assets/img/";

    $sql = "INSERT INTO buku_table (judul_buku,penulis_buku,tahun_terbit,deskripsi,bahasa,tag,gambar) VALUES ('$judul','$pb','$terbit','$deskripsi','$bahasa','$ceks','$gambar')";
    $hasil = $conn->query($sql);

    if ($hasil) {
        if ($ukuran < 20480000 and ($tipe == 'image/png' or $tipe == 'image/jpg' or $tipe == 'image/jpeg')) {
            move_uploaded_file($tmp, $folder . $gambar);
        }
        header("Location: sekar_home.php");
    } else {
        echo "Silahkan Coba Lagi!";
    }
}
?>