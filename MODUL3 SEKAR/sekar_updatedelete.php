<?php
require_once "sekar_db.php";
if (!isset($_GET['id_buku'])) {
    header("Location: sekar_home.php");
}
$id_buku = $_GET['id_buku'];
$sql = "SELECT * from buku_table WHERE id_buku = $id_buku";
$hasils = $conn->query($sql);

if (isset($_POST['edit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = $_POST['tag'];
    $ceks = "";
    foreach ($tag as $cek) {
        $ceks .= $cek . ",";
    }
    $temp = $_FILES['file_upload']['tmp_name'];
    $gambar = rand(0, 9999) . $_FILES['file_upload']['name'];
    $size = $_FILES['file_upload']['size'];
    $type = $_FILES['file_upload']['type'];
    $folder = "assets/img/";

    $id = $hasils->fetch_assoc()['id_buku'];

    $sql = "UPDATE buku_table SET judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', tahun_terbit = '$tahun_terbit',deskripsi = '$deskripsi', bahasa = '$bahasa', tag = '$ceks', gambar = '$gambar' WHERE id_buku = $id";
    $hasil = $conn->query($sql);
    if ($hasil) {
        if ($size < 20480000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')) {
            move_uploaded_file($temp, $folder . $gambar);
        }
        header("Location: sekar_detailbuku.php");
    } else {
        echo "Silahkan Coba Lagi!";
    }
}

if (isset($_POST['hapus'])) {
    $id = $hasils->fetch_assoc()['id_buku'];
    $sql = "DELETE FROM buku_table WHERE id_buku = $id";
    $hasil = $conn->query($sql);
    if ($hasil) {
        header("Location: sekar_home.php");
    } else {
        echo "Silahkan Coba Lagi!";
    }
}
?>