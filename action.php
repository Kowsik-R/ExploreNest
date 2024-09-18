<?php
require 'DBconnect.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Remove single items from cart
if (isset($_GET['remove'])) {

    $user_id = $_GET['user_id'];
    $product_code = $_GET['remove'];

    $sql = "DELETE FROM added_to WHERE product_code = '$product_code' AND cartID = (SELECT id FROM cart WHERE userID = '$user_id')";
    mysqli_query($connection, $sql);

    header("Location: cart.php?id=" . $user_id);
    exit();
    }
//Remove all iteam from the cart
if (isset($_GET['clear'])) {
    $user_id = $_GET['clear'];

    $sql = "DELETE FROM added_to WHERE cartID = (SELECT id FROM cart WHERE userID = '$user_id')";
    mysqli_query($connection, $sql);

    header("Location: cart.php?id=" . $user_id);
    exit();
}
mysqli_close($connection);
?>
