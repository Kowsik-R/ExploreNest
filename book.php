<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="styles.css?v=1.1">
</head>
<body>

<div class="heading" style="background:url(pic/pic9.jpg) no-repeat"> <!-- pic folder and pic change########-->
    <h1> book now </h1>
</div>

<!-- booking section starts -->
<?php
require 'DBconnect.php';

//Discount
if (isset($_GET['id']) && isset($_GET['amount'])) {
    $user_id = $_GET['id'];
    $amount = $_GET['amount']; 
    $flag = True;
    // Check if the userId already exists in the orderTable
    $sql = "SELECT userID FROM orderTable WHERE userID='$user_id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // user exists, proceed without discount
        $flag = False;
    } else {
        // Apply a 15% discount if no existing orders are found for the user
        $amount = intval($amount - ($amount * (15 / 100)));  // convert to integer
    }
} 
?>
<section class="booking">
    <h1 class="heading-title">Book Your Trip</h1>
    <!-- Display discount message if applicable -->
    <?php 
        if ($flag){
            echo "<h3 style='color:#8e44ad; text-align:center;'>CONGRATS! YOU GOT A 15% DISCOUNT!</h3>";
        }
    ?>
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
           
            <div class="inputBox">
                <span>First name :</span>
                <input type="text" placeholder="Enter your first name" name="fname" required>
            </div>

            <div class="inputBox">
                <span>Last name :</span>
                <input type="text" placeholder="Enter your last name" name="lname">
            </div>

            <div class="inputBox">
                <span>Email :</span>
                <input type="email" placeholder="Enter your email" name="email" required>
            </div>

            <div class="inputBox">
                <span>Phone :</span>
                <input type="number" placeholder="Enter your number" name="phone" required>
            </div>

            <div class="inputBox">
                <span>Address :</span>
                <input type="text" placeholder="Enter your address" name="address" required>
            </div>
            <!-- Pass the discounted amount and user ID as hidden fields -->
            <input type="hidden" name="amount" value="<?= $amount ?>">
            <input type="hidden" name="id" value="<?= $user_id?>">
        </div>

        <!-- Display the total amount payable -->
        <h3 style="text-align: center;"><b>Total Amount Payable: </b><?= $amount ?> /-</h3>

        <!-- Payment Mode Selection -->
        <div class="inputBox" style="text-align: center;"><br>
            <div class="form-group" style="display: inline-block;">
                <select name="pmode" class="form-control" style="width: 100%;" required>
                    <option value="" selected disabled>-Select Payment Mode-</option>
                    <option value="cod">Cash On Delivery</option>
                    <option value="netbanking">Net Banking</option>
                    <option value="cards">Debit/Credit Card</option>
                </select>
            </div>
        </div> <!-- Correctly closed this div -->

        <input type="submit" value="Submit" class="btn" name="send">
    </form>
</section>
<!-- booking section ends -->

<!-- footer section starts-->
<?php include('design/footer.php'); ?>
<!-- footer section ends -->

</body>
</html>
