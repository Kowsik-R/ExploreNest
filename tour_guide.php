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
<div class="heading" style="background:url(pic/tg5.jpg) no-repeat"> 
    <h1> tour guide </h1>
    
</div>

<!-- tourGuide section starts -->  
<?php
  include 'DBconnect.php';
  $connection = mysqli_connect('localhost', 'root', '', 'ExploreNest1');
  $sql = "SELECT * FROM tourGuide t,package p where t.product_code=p.product_code;";
  $result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($result)):
?>

<section class="tourGuide">
    <h1 class="heading-title"></h1>
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="<?= $row['product_image'] ?> " alt=""> 
                </div>
                <div class="content">
                    <h3><?= $row['product_name'] ?></h3>
                    <h3><i class="fas fa-dollar-sign"></i><?= $row['product_price'] ?></h3>
                    <form action="" method="post" class="addItem">
                    <input type="hidden" name="pname" value="<?= $row['product_name'] ?>">
                    <input type="hidden" name="pprice" value="<?= $row['product_price'] ?>">
                    <input type="hidden" name="pimage" value="<?= $row['product_image'] ?>">
                    <input type="hidden" name="pcode" value="<?= $row['product_code'] ?>">
                    <p>Date:</p>
                    <h3><input type="date" name="slots" value="<?= $row['slots'] ?>"></h3>
                    <h3 style="text-align: center;">
                        <input type="text" name="loc" value="<?= $row['loc'] ?>" style="font-size: 2rem; text-align: center;">
                    </h3>
                    <input type="submit" value="Add to the cart" class="btn" name="addItem">
                    </form>
                </div>
            </div>
  </div>
</section>
<?php endwhile; ?>


<!-- tourguide section ends -->  



<!-- tourGuide PHP section starts -->
<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'ExploreNest1');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add products into the cart table
if (isset($_POST['addItem'])) {
    $user_id = $_GET['id']; 
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $slots = $_POST['slots'];
    $loc = $_POST['loc'];
    $flag = True;
    $c = 0;

    // Check if the product already exists in the tourGuide table
    $sql = "SELECT slots FROM package WHERE product_code='$pcode'";
    $result = mysqli_query($connection, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['slots'] != "") {
            // Handle slot availability 
            $existing_slots = $row['slots'];
            $slot_array = explode(',', $existing_slots);

            foreach ($slot_array as $i) {
                if ($i==$slots) {
                    $c++;
                } 
            }
            if ($c >= 5) {
                $flag = False;
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
        if (mysqli_num_rows($result) > 0) {
          $user_id = htmlspecialchars($user_id); // Ensure user_id is properly sanitized
          echo "<script>
          alert('Already in the Cart!');
          window.location.href = 'tour_guide.php?id=" . urlencode($user_id) . "';
          </script>";
        } else {
          if ($row['slots'] == "") {
            // If no slots are set, update the slots column
            $sql = "UPDATE package SET slots='$slots' WHERE product_code='$pcode'";
            mysqli_query($connection, $sql);
          }else {
            // If slots are set, add the new slot date
            $updated_slots = $row['slots'].',' .$slots;
            $sql = "UPDATE package SET slots='$updated_slots' WHERE product_code='$pcode'";
            mysqli_query($connection, $sql);
          }
  
  
          $sql = "INSERT INTO added_to (cartID,product_code) VALUES ('$cart_id','$pcode')";
          $result = mysqli_query($connection, $sql);
  
          if ($result) {
            echo "<script>
            alert('Product added to the cart!');
            window.location.href = 'tour_guide.php?id=" . urlencode($user_id) . "';
            </script>";
          } else {
            echo "<script>
            alert('Error!');
            window.location.href = 'tour_guide.php';
            </script>";
          }
        }
    } else {
        echo "<script>
        alert('Product not added due to slot availability!');
        window.location.href = 'tour_guide.php?id=" . urlencode($user_id) . "';
        </script>";
    }
  }
mysqli_close($connection);  // Close the connection after done
?>
<!-- tourGuide PHP section ends -->

<!-- footer section starts-->
<?php include('design/footer.php'); ?>

<!-- footer section ends-->

</body>
</html>