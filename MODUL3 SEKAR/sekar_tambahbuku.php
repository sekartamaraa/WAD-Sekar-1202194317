    <?php
    require_once "sekar_input.php";
    ?>

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/stylesheet.css">

        <title>Tambah Buku</title>
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
    <div class="container">
        <form action="sekar_tambahbuku.php" method="post" enctype="multipart/form-data">
            <div class="row mt-5 pb-5 d-flex justify-content-center">
                <div class="col-lg-9 col-md-8 col-sm-12 shadow-lg p-3 mb-5 bg-body rounded">
                    <h3 class="card-title text-center mt-4"> Tambah Data Buku </h3>
                    <div class="card-body">
                        <div class="form-group fw-bold mb-4">
                            <label for="judul_buku"> Judul </label>
                            <input type="text" class="form-control" name="judul_buku"
                                   placeholder="Contoh: Pemograman web bersama EAD" required id="judul_buku">
                        </div>
                        <div class="form-group mb-3 fw-bold mb-4">
                            <label for="penulis_buku"> Penulis </label>
                            <input type="text" class="form-control" value="<?= $penulis ?>" name="penulis_buku" required
                                   id="penulis_buku" readonly>
                        </div>
                        <div class="form-group mb-3 fw-bold mb-4">
                            <label for="tahun_terbit"> Tahun Terbit </label>
                            <input type="number" class="form-control" name="tahun_terbit" placeholder="Contoh: 1990"
                                   required id="tahun_terbit">
                        </div>
                        <div class="form-group mb-3 fw-bold mb-4">
                            <label for="deskripsi"> Deskripsi </label>
                            <textarea name="deskripsi" id="deskripsi" placeholder="Contoh: Buku ini menjelaskan tentang..."
                                      class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group mb-4" id="bahasa">
                            <label for="tag" class="col-sm-1 col-form-label"><b> Bahasa </b></label>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="bahasa" required id="bahasa_indonesia"
                                       value="Indonesia">
                                <label for="bahasa_indonesia" class="form-check-label"> Indonesia </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input ml-3" name="bahasa" required id="bahasa_lainnya"
                                       value="Lainnya">
                                <label for="bahasa_lainnya" class="form-check-label"> Lainnya </label>
                            </div>
                        </div>
                        <div class="form-group">
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
                            <label for="file_upload" class="col-sm-5 col-form-label mt-3"><b> Upload Gambar </b></label>
                            <div class="custom-file" id="file_upload">
                                <input type="file" class="custom-file-input" name="file_upload" id="customFile">
                            </div>
                            <div class="mt-5 text-center">
                                <button type="submit" name="submit" class="btn btn-primary mr-1"
                                        style="padding-left: 300px; padding-right: 300px;">+ TAMBAH
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
    </div>

    <?php
    require_once "sekar_footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <script !src="">
        $(document).on('change', '.custom-file-input', function (event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        });
    </script>
    </body>
    </html>