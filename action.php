<?php
require 'DBconnect.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Remove single items from cart
if (isset($_GET['remove'])) {

    $user_id = $_GET['user_id'];
    $product_code = $_GET['remove'];
    $sql = "SELECT id FROM cart WHERE userID='$user_id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $cart_id = $row['id'];

    // Fetch the product code from the cart for the given id
    $sql = "SELECT qty,product_code FROM added_to  WHERE product_code='$product_code' and cartId='$cart_id'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_code = $row['product_code'];
        $product_type = $product_code[0];
        // Determine product table name based on product type
        $product_table = [  //dictonary
            'a' => 'activity',
            'p' => 'premade',
            't' => 'tourGuide',
            'h' => 'hotel',
            'c' => 'car'
        ];

        $product = $product_table[$product_type];

        if ($product=='premade'){ //premade qty based on number of nights
            $sql = "SELECT nights FROM $product WHERE product_code='$product_code'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $qty = $row['nights'];
        }else{
            $qty = $row['qty'];
        }
        
        // Fetch the slots from the relevant table for the fetched product code
        $sql = "SELECT slots FROM package WHERE product_code='$product_code'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
            
        $slot_array = explode(',', $row['slots']);
            

        //delete all the dates(Arrival to leaving)
        for ($i = 0; $i < $qty; $i++) {
            array_pop($slot_array);
        }

        $updated_slots = implode(',', $slot_array);
        


        $sql = "UPDATE package SET slots='$updated_slots' WHERE product_code='$product_code'";
        mysqli_query($connection, $sql);
        // Delete the item from the cart
        $sql = "DELETE FROM added_to WHERE product_code='$product_code' and cartId='$cart_id'";
        mysqli_query($connection, $sql);

        // Redirect back to the cart page
        header("Location: cart.php?id=" . $user_id);
        exit();
    }
} 

mysqli_close($connection);
?>
