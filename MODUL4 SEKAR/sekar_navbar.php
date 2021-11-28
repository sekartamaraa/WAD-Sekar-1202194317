<?php
if (isset($_COOKIE['theme'])) {
    $latar = $_COOKIE['theme'];
} else {
    $latar = 'bg-default';
}
?>
<nav class="navbar navbar-expand-lg navbar-light <?php echo $latar ?>" style="background: #a4c0f3;">
    <div class="container">
        <a class="navbar-brand" href="index.php" style="margin-left: 245px;"><img alt="" id="logo-nav"><b>EAD TRAVEL</b></a>
    </div>
    <div style="margin-right: 130px; padding-right:120px;">
        <ul class="navbar-nav">
            <?php
            if (!isset($_SESSION['logged_in'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="sekar_register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sekar_login.php">Login</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="sekar_bookings.php"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                        <div class="d-sm-none d-lg-inline-block text-primary text-dark"><?php echo $_SESSION['nama'] ?></div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="sekar_profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form action="index.php" method="post">
                            <li><button class="dropdown-item" type="submit" name="btn_logout">Logout</button></li>
                        </form>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
