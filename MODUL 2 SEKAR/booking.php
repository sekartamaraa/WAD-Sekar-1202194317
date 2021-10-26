<?php
$hall = array(
    array(0, "Nusantara Hall", 2000, 5000, "img/nusantarahall.jpg"),
    array(1, "Garuda Hall", 1000, 2000, "img/garudahall.jpg"),
    array(2, "Gedung Serba Guna", 500, 200, "img/gedungserbaguna.jpg")
);

$spesifikasi = array(
    array("Free Parking", "Full AC", "Cleaning Service", "Covid-19 Health Protocol"),
    array("Free Parking", "Full AC", "No Cleaning Service", "Covid-19 Health Protocol"),
    array("No Free Parking", "No Full AC", "No Cleaning Service", "Covid-19 Health Protocol")
);

$tambahan = array(
    array(0, 700, "Catering"),
    array(1, 450, "Decoration"),
    array(2, 250, "Sound System")
);

if (!isset($_GET['id'])) {
    $id = 1;
} else {
    $id = $_GET['id'];
};
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white">
    <div class="container">
        <a class="navbar-brand text-success" href="#"></a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"></div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="home.php"> Home </a></li>
                <li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
            </ul>
        </div>
    </div>
</nav>

<section>
    <div class="container my-5">
        <center><p class="text text-white bg-dark py-3">Reserve your venue now!</p></center>
        <div class="row my-1 mx-1">
            <div class="container my-3" style="border:1px solid #F3F3F3; border-radius: 5px;">
                <div class="row py-3 px-3">
                    <div class="col-lg my-auto">
                        <?php
                        echo "<img src='" . $hall[$id][4] . "' style='max-height:300px' id='image'/>";
                        ?>
                    </div>
                    <div class="col-lg">
                        <form class="booking" action="myBooking.php" id="booking" method="post">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="nama" id="name" value="Sekar_1202194317"
                                   readonly>

                            <label for="date" class="my-2">Event Date</label>
                            <input type="date" class="form-control" name="tanggal" id="date" placeholder="mm/dd/yyyy"
                                   required>

                            <label for="time" class="my-2">Start Time</label>
                            <input type="time" class="form-control" name="waktu" id="time" placeholder="--:-- --"
                                   required>

                            <label for="duration" class="my-2">Duration (Hours)</label>
                            <input type="number" class="form-control" name="durasi" id="duration" placeholder="0"
                                   required>

                            <label for="type" class="my-2">Building Type</label>
                            <select class="form-control" name="tipe" id="type" onchange="myFunction()" required>
                                <option value="">Choose..</option>
                                <option value="<?php echo $hall[0][0]; ?>"><?php echo $hall[0][1]; ?></option>
                                <option value="<?php echo $hall[1][0]; ?>"><?php echo $hall[1][1]; ?></option>
                                <option value="<?php echo $hall[2][0]; ?>"><?php echo $hall[2][1]; ?></option>
                            </select>

                            <script>
                                function myFunction() {
                                    var x = document.getElementById("type").value;
                                    var building = <?php echo json_encode($hall); ?>;
                                    var y = building[x][4];
                                    document.getElementById("image").src = y;
                                }
                            </script>

                            <label for="phone" class="my-2">Phone Number</label>
                            <input type="number" class="form-control" name="nohp" id="phone" placeholder="0" required>

                            <p class="mb-0 mt-4">Add Service(s)</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ctrg" value="0" id="a">
                                <label class="form-check-label" for="a">
                                    Catering / $700
                                </label></div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="dcrtn" value="1" id="b">
                                <label class="form-check-label" for="b">
                                    Decoration / $450
                                </label></div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ss" value="2" id="c">
                                <label class="form-check-label" for="c">
                                    Sound System / $250
                                </label></div>
                            <input type="submit" class="form-control btn-primary mt-3" value="Book">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<footer>
    <section class="bg-light mt-5 ">
        <div class="container py-2">
            <center>
                <p class="pt-2">© Created by: Sekar_1202194317</p>
            </center>
        </div>
    </section>
</footer>
</body>
</html>