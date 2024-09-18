<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="header">
    <a href="home.php" class="logo">ExploreNest</a>
    <nav class="navbar">
        <a href="home.php?id=<?php echo $_GET['id']; ?>">home</a>
        <a href="about.php?id=<?php echo $_GET['id']; ?>">about</a>
        <a href="package.php?id=<?php echo $_GET['id']; ?>">package</a>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">custome package</a>
            <div class="dropdown-content">
                <a href="hotel.php?id=<?php echo $_GET['id']; ?>">hotels</a>
                <a href="car_rental.php?id=<?php echo $_GET['id']; ?>">car rental</a>
                <a href="tour_guide.php?id=<?php echo $_GET['id']; ?>">tour guide</a>
                <a href="activity.php?id=<?php echo $_GET['id']; ?>">activities</a>
            </div>
        </li>
        <a href="#"><i class="fa fa-search"></i></a>
        <a class="nav-link" href="cart.php?id=<?php echo $_GET['id']; ?>"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>

</section>
</body>
</html>