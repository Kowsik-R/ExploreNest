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



<div class="heading" style="background:url(pic/pic9.jpg) no-repeat"> <!-- pic folder and pic change########-->
    <h1> book now </h1>
    
</div>


<!-- booking section starts -->
<?php
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $amount = $_GET['amount'];
} 
?>
<section class="booking">
    <h1 class="heading-title">book your trip</h1>
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>First name :</span>
                <input type="text" placeholder="Enter your first name" name="fname">
            </div>

            <div class="inputBox">
                <span>last name :</span>
                <input type="text" placeholder="Enter your last name" name="lname">
            </div>

            <div class="inputBox">
                <span>email :</span>
                <input type="email" placeholder="Enter your email" name="email">
            </div>

            <div class="inputBox">
                <span>phone :</span>
                <input type="number" placeholder="Enter your number" name="phone">
            </div>

            <div class="inputBox">
                <span>address :</span>
                <input type="text" placeholder="Enter your address" name="address">
            </div>
            <input type="hidden" name="amount" value="<?=$amount?>">
            <input type="hidden" name="id" value="<?=$user_id?>">


        </div>

        <input type="submit" value="submit" class="btn" name="send">
    </form>
</section>
<!-- booking section ends -->
<!-- footer section starts-->
<?php include('design/footer.php'); ?>

<!-- footer section ends-->
</body>
</html>