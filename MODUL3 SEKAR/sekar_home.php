<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/stylesheet.css">
        <title>Home</title>
    </head>

    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <img src="./assets/img/logo-ead.png" alt="" width="150" height="40" class="d-inline-block align-text-top">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="sekar_tambahbuku.php"><button class="btn btn-primary"> Tambah Buku </button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <section class="container mt-5 mb-5">
            <div class="row">
                <?php
                require_once 'sekar_db.php';
                $sql = "SELECT * FROM buku_table";
                $hasil = $conn->query($sql);
                $kondisi = false;
                if (mysqli_num_rows($hasil) > 0) {
                    $kondisi = true;
                }
                if ($kondisi) {
                    while ($buku = $hasil->fetch_assoc()) {
                        echo '
                            <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
                                <div class="card h-100 border-0 shadow p-3 mb-5 bg-body rounded">
                                    <div class="card-img-top" style="overflow: hidden; height: 100%;">
                                        <img src="assets/img/' . $buku["gambar"] . '" alt="" style="max-width: 100%;object-position: center;object-fit: cover">
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-12">
                                            <h4>' . $buku["judul_buku"] . '</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-10">
                                                <p>' . $buku["deskripsi"] . '</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-4 bg-transparent" style="margin-left: 15px";>
                                        <a class="btn btn-primary" href="sekar_detailbuku.php?id_buku=' . $buku["id_buku"] . '">Tampilkan Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                    ';}} 
                    
                    else {
                    echo '
                    <div class="col-12">
                        <center>
                            <div style="margin-top: 150px;">
                                <h3>Belum ada buku!</h3>
                                <hr class="bg-primary" />
                                <p>Silahkan menambahkan buku</p>
                            </div>
                        </center>
                    </div>
                ';}
                ?>
            </div>
        </section>

        <?php
        require_once "sekar_footer.php";
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>