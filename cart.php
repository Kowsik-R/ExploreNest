<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>


    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>



    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- custom  js file -->
    <script src="js/script.js" type="scripttype"></script>

    <link rel="stylesheet" href="styles.css?v=1.1">

    <!-- shoping cart icon file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<!-- header section starts -->  
<section class="header">
    <a href="home.php" class="logo">ExploreNest</a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">custome package</a>
            <div class="dropdown-content">
                <a href="hotel.php">hotels</a>
                <a href="flight.php">flights</a>
                <a href="car_rental.php">car rental</a>
                <a href="tour_guide.php">tour guide</a>
                <a href="activity.php">activities</a>
            </div>
        </li>
        <a href="#"><i class="fa fa-search"></i></a>
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
</section>
<!-- header section ends -->  





  <!-- Cart section starts -->

  <?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'ExploreNest');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add products into the cart table
if (isset($_POST['addItem'])) {

    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $slots = $_POST['slots'];
    $flag = True;
    $c = 0;

    // Check if the product already exists in the activity table
    $sql = "SELECT slots FROM activity WHERE product_code='$pcode'";
    $result = mysqli_query($connection, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        if ($row['slots'] == "") {
            // If no slots are set, update the slots column
            $sql = "UPDATE activity SET slots='$slots' WHERE product_code='$pcode'";
            mysqli_query($connection, $sql);
        } else {
            // Handle slot availability and update accordingly
            $existing_slots = $row['slots'];
            $slot_array = explode(',', $existing_slots);

            foreach ($slot_array as $i) {
                if ($i==$slots) {
                    $c++;
                } 
            }

            if ($c >= 5) {
                echo "No available slots";
                $flag = False;
            } else {
                $updated_slots = $row['slots'].',' .$slots;
                $sql = "UPDATE activity SET slots='$updated_slots' WHERE product_code='$pcode'";
                mysqli_query($connection, $sql);
            }
        }
    } 

    // If slot update was successful and there are available slots, add product to cart
    if ($flag) {
        $sql = "SELECT product_code FROM cart WHERE product_code='$pcode'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "Already in the Cart";
        } else {
            $sql = "INSERT INTO cart (product_name, product_price, product_image, product_code) VALUES ('$pname', '$pprice', '$pimage', '$pcode')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo "Product added to the cart!";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Product not added due to slot availability";
    }
}

mysqli_close($connection);  // Close the connection after done
?>



<div class="cart-table">
  <table class="table">
    <thead>
      <tr>
        <td colspan="6">
          <h4>Products in your cart!</h4>
        </td>
      </tr>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>
          <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
        </th>
      </tr>
    </thead>
    <tbody>
              <?php
                require 'DBconnect.php';
                $connection = mysqli_connect('localhost', 'root', '', 'ExploreNest');
                $sql = 'SELECT * FROM cart';
                $result = mysqli_query($connection, $sql);
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['product_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="home.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>














  
              
  



<!-- cart section ends -->










<!-- footer section starts-->
<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
            <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
            <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i> ask questions</a>
            <a href="#"><i class="fas fa-angle-right"></i> about us</a>
            <a href="#"><i class="fas fa-angle-right"></i> privacy policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> terms of use</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i> *123-456-7890 </a>
            <a href="#"><i class="fas fa-phone"></i> *111-222-3333 </a>
            <a href="#"><i class="fas fa-envelope"></i>fayeezayousuf360@gmail.com </a>
            <a href="#"><i class="fas fa-map"></i> dhaka, bangladesh - 1</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i>Facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn</a>
        </div>

    </div>
    
    <div class="credit"> created by <span> nameeeeeeee </span> | all rights reserved!</div>

</section>

<!-- footer section ends-->





<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>