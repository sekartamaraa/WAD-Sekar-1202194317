    <?php
    require_once "sekar_updatedelete.php";
    ?>

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/stylesheet.css">

        <title>Detail Buku</title>
    </head>

    <body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="./assets/img/logo-ead.png" alt="" width="150" height="40" class="d-inline-block align-text-top">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="sekar_tambahbuku.php">
                                <button class="btn btn-primary">Tambah Buku</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid mr-0 ml-5 mt-5 mb-5 pr-5 pl-5 col-12" style="padding-left: 300px; padding-right: 300px;">
        <div class="card m-5 border-0 shadow">
            <section class="container mt-5 ml-5 mr-5 mb-5" style="padding-left: 50; padding-right: 50;">
                <?php
                foreach ($hasil as $hasils) {
                    ?>
                    <div class="card-img-top" style="overflow: hidden;height: 100%">
                        <img src="assets/img/<?= $hasil["gambar"] ?>" alt=""
                             style="object-position: center;object-fit: fill;max-width: 100%">
                    </div>
                    <div class="mt-5 text-bold">
                        <hr/>
                    </div>
                    <div class="card-body">
                        <div class="row col-12">
                            <label for="judul_buku"><b> Judul : </b></label>
                            <p id="judul_buku"><?= $hasil["judul_buku"] ?></h3>
                        </div>
                        <div class="row col-12">
                            <label for="penulis_buku"><b> Penulis : </b></label>
                            <p id="penulis_buku"><?= $hasil["penulis_buku"] ?></p>
                        </div>

                        <div class="row col-12">
                            <label for="penulis_buku"><b> Tahun Terbit : </b></label>
                            <p id="tahun_terbit"><?= $hasil["tahun_terbit"] ?></p>
                        </div>

                        <div class="row col-12">
                            <label for="deskripsi"><b> Deskripsi : </b></label>
                            <p id="deskripsi"><?= $hasil["deskripsi"] ?></p>
                        </div>

                        <div class="row col-12">
                            <label for="bahasa"><b> Bahasa : </b></label>
                            <p id="bahasa"><?= $hasil["bahasa"] ?></p>
                        </div>

                        <div class="row col-12">
                            <label for="tag"><b> Tag : </b></label>
                            <p id="tag"><?= $hasil["tag"] ?></p>
                        </div>
                    </div>
                    <div class="text-center d-flex justify-content-around" style="border: none">
                        <button class="btn btn-primary w-25" data-toggle="modal" data-target="#modal_edit"> Setting</button>
                        <button class="btn btn-danger w-25" data-toggle="modal" data-target="#modal_delete"> Hapus</button>
                    </div>
                <?php } ?>
            </section>
        </div>
    </div>

    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="modal_delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_delete">Peringatan!</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hapus Buku?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form action="" method="post">
                        <button type="submit" name="hapus" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="modal_edit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit">Sunting</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row d-flex justify-content-center">
                            <div class="form-group fw-bold mb-4">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control" value="<?= $hasil["judul_buku"] ?>"
                                       name="judul_buku" required id="judul_buku">
                            </div>
                            <div class="form-group mb-4 fw-bold">
                                <label for="penulis_buku">Penulis</label>
                                <input type="text" class="form-control" value="<?= $hasil["penulis_buku"] ?>"
                                       name="penulis_buku" required id="penulis_buku" readonly>
                            </div>
                            <div class="form-group mb-4 fw-bold">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" class="form-control" value="<?= $hasil["tahun_terbit"] ?>"
                                       name="tahun_terbit" required id="tahun_terbit">
                            </div>
                            <div class="form-group mb-4 fw-bold">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"
                                          rows="4"><?= $hasil["deskripsi"] ?></textarea>
                            </div>
                            <div class="form-group mb-4" id="bahasa">
                                <label for="tag" class="col-sm-1 col-form-label"><b> Bahasa </b></label>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="bahasa" required
                                           id="bahasa_indonesia" value="Indonesia">
                                    <label for="bahasa_indonesia" class="form-check-label"> Indonesia </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input ml-3" name="bahasa" required
                                           id="bahasa_lainnya" value="Lainnya">
                                    <label for="bahasa_lainnya" class="form-check-label"> Lainnya </label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="tag" class="col-sm-1 col-form-label"><b>Tag</b></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_pemograman" value="Pemograman"
                                           name="tag[]">
                                    <label class="form-check-label" for="tag_pemograman"> Pemrograman </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_website" value="Website"
                                           name="tag[]">
                                    <label class="form-check-label" for="tag_website"> Website </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_java" value="Java" name="tag[]">
                                    <label class="form-check-label" for="tag_java"> Java </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_oop" value="OOP" name="tag[]">
                                    <label class="form-check-label" for="tag_oop"> OOP </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_mvc" value="MVC" name="tag[]">
                                    <label class="form-check-label" for="tag_mvc"> MVC </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_kalkulus" value="Kalkulus"
                                           name="tag[]">
                                    <label class="form-check-label" for="tag_kalkulus"> Kalkulus </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tag_lainnya" value="Lainnya"
                                           name="tag[]">
                                    <label class="form-check-label" for="tag_lainnya"> Lainnya </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file_upload" class="col-sm-5 col-form-label"><b> Upload Gambar </b></label>
                                <div class="custom-file" id="file_upload">
                                    <input type="file" class="custom-file-input" name="file_upload" id="customFile" require>
                                </div>
                            </div>
                            <div class="modal-footer mt-5">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
                                <button type="submit" name="edit" class="btn btn-primary"> Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php
    require_once "sekar_footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    </body>
    </html>