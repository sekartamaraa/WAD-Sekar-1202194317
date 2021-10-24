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
  
if(!isset($_POST['tanggal'])){
    echo "Silahkan isi yang benar!!";
    exit;
}else{
    $id = rand(100,999);
    $name = $_POST['nama'];
    $in = date('m-d-Y H:i:s', strtotime($_POST['tanggal'].$_POST['waktu']));
    $dura = "+".$_POST['durasi']." hours";
    $out = date('m-d-Y H:i:s',strtotime($dura,strtotime($_POST['tanggal'].$_POST['waktu'])));
    $type = $hall[$_POST['tipe']][1];
    $phone = $_POST['nohp'];
    $price = $_POST['durasi']*$hall[$_POST['tipe']][2];
    $add1 = 0;
    $add2 = 0;
    $add3 = 0;
   
}
if(isset($_POST['ctrg'])){
    $catering = $_POST['ctrg'];
    $add1 = $tambahan[$catering][1];
}
if(isset($_POST['dcrtn'])){
    $decor = $_POST['dcrtn'];
    $add2 = $tambahan[$decor][1];
}
if(isset($_POST['ss'])){
    $sound = $_POST['ss'];
    $add3 = $tambahan[$sound][1];
}
    $total = $price + $add1 + $add2 + $add3;
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data PesananMu</title>
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
			<div class="collapse navbar-collapse"id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item"><a class="nav-link" href="home.php"> Home </a></li>
					<li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
				</ul>
			</div>
		</div>
	</nav>

    <section>
        <div class="container mt-5">
        <center>
            <h2>Thank You <?php echo $name;?> for Reserving</h2>
            <h3>Please double check your reservation details</h3>
        </center>
        <table class="table table-bordered table-stripped mt-3">
                <th>Booking Number</th>
                <th>Name</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Building Type</th>
                <th>Phone Number</th>
                <th>Service</th>
                <th>Total Price</th>
            </thead>
            <tbody class="bg-light">
                <td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $in;?></td>
                <td><?php echo $out;?></td>
                <td><?php echo $type;?></td>
                <td><?php echo $phone;?></td>
                <td><?php 
                if(isset($_POST['strg'])){
                    echo "<li>".$tambahan[$catering][2]."</li>";
                }
                if(isset($_POST['dcrtn'])){
                    echo "<li>".$tambahan[$decor][2]."</li>";
                }
                if(isset($_POST['ss'])){
                    echo "<li>".$tambahan[$sound][2]."</li>";
                }
                ?></td>
                <td><?php echo "$".$total;?></td>
            </tbody>
        </table>
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