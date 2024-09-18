<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="styles.css?v=1.1">
</head>
<body>
<!-- header section starts -->  
<?php include('design/header.php'); ?>
<!-- header section ends -->  

<div class="heading" style="background:url(pic/pic4.jpg) no-repeat"> 
    <h1> packages </h1>
    
</div>

<!-- activity section starts --> 
<?php
  include 'DBconnect.php';
  $sql = "SELECT * FROM premade a,package p where a.product_code=p.product_code";
  $result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($result)):
?>

<section class="activities">
  <div class="box-container">
    <div class="box">
      <div class="image">
        <img src="<?= $row['product_image'] ?>" alt=""> 
      </div>
      <div class="content">
        <h3><?= $row['product_name'] ?></h3>
        <h3><i class="fas fa-dollar-sign"></i><?= $row['product_price'] ?></h3>
        <form action="" method="post" class="addItem">
          <input type="hidden" name="pcode" value="<?= $row['product_code'] ?>">
          <p>Check-In:</p>
          <input type="date" name="arrival" required>
          <h3><?= $row['loc'] ?></h3>
          <h3><?= $row['nights'] ?><h3>Nights</h3></h3>
          <input type="submit" value="Add to the cart" class="btn" name="addItem">
        </form>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<!-- activity section ends -->



<!-- activity PHP section starts -->
<?php
require 'DBconnect.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add products into the cart table
if (isset($_POST['addItem'])) {
  $user_id = $_GET['id']; 
  $pcode = $_POST['pcode'];
  $arrival = $_POST['arrival'];
  $flag = True;

  $start_date = strtotime($arrival);
  $dates_array = array();


  $sql = "SELECT nights FROM premade WHERE product_code='$pcode'";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  $leaving = $row['nights'];

  for ($i = 0; $i < $leaving; $i++) {
    $dates_array[] = date("m-d-Y", $start_date);
    $start_date = strtotime("+1 day", $start_date);
  }

  $sql = "SELECT slots FROM package WHERE product_code='$pcode'";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  $clash_dates = array(); //dates which clashes with the existing dates

  foreach ($dates_array as $i){
    if ($result && mysqli_num_rows($result) > 0) {
        $c=0;
        if ($row['slots'] != "") {
            // Handle slot availability 
            $existing_slots = $row['slots'];
            $slot_array = explode(',', $existing_slots);

            foreach ($slot_array as $j) {
                if ($j==$i) {
                    $c++;
                } 
            }
            if ($c >= 5) {
              $flag = False;
              array_push($clash_dates, $i);
            } 
        }
    }
  } 

    // If slot update was successful and there are available slots, add product to cart
    if ($flag) {

      $sql = "SELECT id FROM cart WHERE userID='$user_id'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);
      $cart_id = $row['id'];


      $sql = "SELECT product_code FROM added_to WHERE product_code='$pcode' and cartId='$cart_id'";
      $result = mysqli_query($connection, $sql);
      $slots = implode(',', $dates_array);
      
      if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Already in the Cart!');
        window.location.href = 'package.php?id=" . $user_id . "';
        </script>";
      } else {
 
        $sql = "INSERT INTO added_to (cartID,product_code,dates) VALUES ('$cart_id','$pcode','$slots')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
          echo "<script>
          alert('Product added to the cart!');
          window.location.href = 'package.php?id=" .$user_id . "';
          </script>";
        } else {
          echo "<script>
          alert('Error!');
          window.location.href = 'package.php';
          </script>";
        }
      }
  } else {
    $clash_dates = implode(',', $clash_dates);
    echo "<script>
    alert('Sorry, product cannot be added due to slot unavailability on $clash_dates!');
    window.location.href = 'package.php?id=" . $user_id . "';
    </script>";
  }
}

mysqli_close($connection);  // Close the connection after done
?>

<!-- activity PHP section ends -->
 

<!-- footer section starts-->
<?php include('design/footer.php'); ?>

<!-- footer section ends-->
</body>
</html>