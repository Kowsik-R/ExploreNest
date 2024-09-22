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


<div class="heading" style="background:url(pic/pic22.jpg) no-repeat"> 
    <h1> about us</h1>
    
</div>

<!-- about us section starts -->

<section class="about">
    <div class="image">
        <img src="pic/pic5.jpg" alt="">
    </div>

    <div class="content">
        <div class="icon-container">
            <i class="fas fa-map"></i>
            <span>top destinations</span>
        </div>

        <div class="icon-container">
            <i class="fas fa-hand-holding-usd"></i>
            <span>affordable price</span>
        </div>

        <div class="icon-container">
            <i class="fas fa-headset"></i>
            <span>24/7 service</span>
        </div>
</section>

<!-- about us section ends -->

<!-- enter your review section starts --> 
<section class="review">
    <h1 class="heading-title">Enter your review</h1>
    <form action="" method="post" class="add-review">
        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>Star :</span>
                <input type="number" placeholder="Star" name="star" min="1" max="5" required>
            </div>
            <div class="inputBox">
                <span>Comment :</span>
                <input type="text" placeholder="Enter your comment" name="comment" required>
            </div>
        </div>
        <input type="submit" value="submit" class="btn" name="add-review">
    </form>
</section>

<?php
require 'DBconnect.php';

if (isset($_POST['add-review'])) { //form (class)
    $name = $_POST['name'];
    $star = $_POST['star'];
    $comment = $_POST['comment'];
    $user_id = $_GET['id'];

    $sql = "INSERT INTO review (userID, name, star, comment) VALUES ('$user_id','$name', '$star', '$comment')";
    $result = mysqli_query($connection, $sql);


    if ($result) {
        echo "<script>
            alert('Review added successfully!');
            window.location.href = 'about.php?id=" . $user_id . "';
            </script>";
    } else {
        echo "Error: ";
    }
}
mysqli_close($connection);
?>

<!-- Review section starts -->
<h1 style="font-size: 5rem; text-align: center;">Reviews</h1>

<?php
require 'DBconnect.php';
$sql = "SELECT * FROM review";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0):
    while ($row = mysqli_fetch_assoc($result)):
?>

<section class="reviews">
  <div class="box-container">
    <div class="box">
        <p>Customer name:</p>
        <h3><?= $row['name'] ?></h3>
        <p>Rating:</p>
        <h3><?= $row['star'] ?><i class="fa fa-star" aria-hidden="true"></i></h3>
        <p>Comment:</p>
        <h3><?= $row['comment'] ?></h3>
    </div>
  </div>
</section>

<?php 
    endwhile; 
else:
    echo "<p style='text-aligh:center; font-size: 3rem;'>No reviews found.</p>";
endif;
?>


<!-- review section ends-->

<!-- footer section starts-->
<?php include('design/footer.php'); ?>

<!-- footer section ends-->
</body>
</html>