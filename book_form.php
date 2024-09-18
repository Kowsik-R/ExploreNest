<?php
require 'DBconnect.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {

    $pmode = $_POST['pmode'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $user_id = $_POST['id'];

    // Insert the new order into orderTable
    $sql = "INSERT INTO orderTable (firstName, lastName, email, phone, address, amount, userID, payment_mode) 
            VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$amount', '$user_id', '$pmode')";
    $result = mysqli_query($connection, $sql);

    // Get the last inserted order ID
    $order_id = mysqli_insert_id($connection);

    // Select product codes from added_to and cart tables
    $sql = "SELECT a.product_code,a.dates 
            FROM added_to a, cart c 
            WHERE c.userID='$user_id' AND c.id=a.cartID";
    $result = mysqli_query($connection, $sql);

    // Insert product codes into the product_details table
    while ($row = mysqli_fetch_assoc($result)) {
        $product_code = $row['product_code'];
        $slots = $row['dates'];
        $sql1 = "SELECT slots FROM package WHERE product_code='$product_code'";
        $result1 = mysqli_query($connection, $sql1);
        $row1 = mysqli_fetch_assoc($result1); 
        if ($row1['slots'] == "") {
            // If no slots are set, update the slots column
            $sql = "UPDATE package SET slots='$slots' WHERE product_code='$product_code'";
            mysqli_query($connection, $sql);
        }else {
            // If slots are set, add the new slot date
            $updated_slots = $row1['slots'].','.$slots; 
            $sql = "UPDATE package SET slots='$updated_slots' WHERE product_code='$product_code'";
            mysqli_query($connection, $sql);
        }

        $sql = "INSERT INTO product_details (productCode, orderID, dates) VALUES ('$product_code', '$order_id','$slots')";
        mysqli_query($connection, $sql); 
    }
    
    //Delete from the added_to after placing the order
    $sql = "DELETE FROM added_to WHERE cartID=(Select id from cart where userID='$user_id')"; 
    $result = mysqli_query($connection, $sql);
    header("Location: thank_you.php?id=". $user_id);
    exit();

    
} else {
    echo 'Something went wrong, try again.';
}
?>
