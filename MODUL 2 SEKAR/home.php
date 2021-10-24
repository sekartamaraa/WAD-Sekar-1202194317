<?php
$hall = array (
	array(0,"Nusantara Hall", 2000, 5000, "img/nusantarahall.jpg"),
	array(1,"Garuda Hall", 1000, 2000, "img/garudahall.jpg"),
	array(2,"Gedung Serba Guna", 500, 200, "img/gedungserbaguna.jpg")
  );

$spesifikasi = array (
    array("Free Parking", "Full AC", "Cleaning Service", "Covid-19 Health Protocol"),
    array("Free Parking", "Full AC", "No Cleaning Service", "Covid-19 Health Protocol"),
    array("No Free Parking", "No Full AC", "No Cleaning Service", "Covid-19 Health Protocol")
  );

$tambahan = array (
    array(0,700,"Catering"),
    array(1,450,"Decoration"),
    array(2,250,"Sound System")
  );
?>

<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
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

    <section class="pb-5">
        <div class="container mt-3 mb-2">
            <center>
                <h3>WELCOME TO ESD VENUE RESERVATION</h3>
                <p class="text text-white bg-dark py-2 mb-0">Find your best deal for your event, here!</p>
            </center>
        <div class="row">
    <?php 
        for ($row = 0; $row < 3; $row++) {
        echo "
        <div class='col-sm'>
        <div class='card mt-3'>
            <img class='card-img-top' src='".$hall[$row][4]."' style='max-height:200px' />
            <div class='card-body'>
                <h5 class='card-title'>".$hall[$row][1]."</h5>
                <p>$".$hall[$row][2]." / Hour </p>
                <p>".$hall[$row][3]." Capacity </p>";
        echo "<center><ul class='list-group list-group-flush'>";
            for ($i=0; $i < 4; $i++) {
                if($spesifikasi[$row][$i]=="No Free Parking"||$spesifikasi[$row][$i]=="No Full AC"||$spesifikasi[$row][$i]=="No Cleaning Service"){
                    echo "
                    <li class='list-group-item' style='color:red'>".$spesifikasi[$row][$i]."</li>
                    ";
                }else{
                    echo "
                    <li class='list-group-item' style='color:green'>".$spesifikasi[$row][$i]."</li>
                    ";
                }
            }      
        echo "</ul></center>";
        echo "</div>";
        echo "<div class='card-footer'><center><a class='btn btn-primary' href='booking.php?id=".$hall[$row][0]."'>Book Now</a></center></div>";
        echo "</div>";
        echo "</div>";
        }
    ?>
        </div>
        </div>
    </section>

    <footer>
        <section class="bg-light mt-5 ">
            <div class="container py-2">
                <center><p class="pt-2">© Created by: Sekar_1202194317</p></center>
            </div>
        </section>
    </footer>
</body>
</html>