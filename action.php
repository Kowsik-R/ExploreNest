<?php
session_start();
require 'DBconnect.php';


$connection = mysqli_connect('localhost', 'root', '', 'ExploreNest');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    // Fetch the product code from the cart for the given id
    $sql = "SELECT product_code FROM cart WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $product_code = $row['product_code'];

        // Fetch the slots from the activity table for the fetched product code
        $sql = "SELECT slots FROM activity WHERE product_code='$product_code'";
        $result = mysqli_query($connection, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            $existing_slots = $row['slots'];

            // Convert the slots string into an array
            $slot_array = explode(',', $existing_slots);

            // Remove the last element from the array
            array_pop($slot_array);

            // Concatenate the array back into a string
            $updated_slots = implode(',', $slot_array);

            // Update the slots in the activity table
            $sql = "UPDATE activity SET slots='$updated_slots' WHERE product_code='$product_code'";
            mysqli_query($connection, $sql);
        }

        // Delete the item from the cart
        $sql = "DELETE FROM cart WHERE id='$id'";
        mysqli_query($connection, $sql);

        // Redirect back to the cart page
        header("Location: cart.php");
        exit();
    }
}


// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $sql = "DELETE FROM cart";
    $result = mysqli_query($connection, $sql);
    header("Location: cart.php");  
    exit();
  }


mysqli_close($connection); 
?>

