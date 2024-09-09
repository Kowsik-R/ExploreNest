<?php
session_start();  // Start the session

$connection = mysqli_connect('localhost', 'root', '', 'ExploreNest1');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    echo "Processing insert...<br>";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $user_id = $_POST['id'];
    echo $amount;
    $sql = "SELECT email FROM orderTable where email='$email'";
    $result = mysqli_query($connection, $sql);
    echo "haha";
    if (mysqli_num_rows($result) > 0){
        echo "not a new";
    }else{
        echo "new";
        $amount = $amount - $amount * (15 / 100);
        echo "new";
    }
        echo "Processing insert...<br>";
        // If no bookings exist, you can directly insert the new booking
        $sql = "INSERT INTO orderTable (firstName, lastName, email, phone, address, amount, userID) 
                    VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$amount','$user_id')";
        $result = mysqli_query($connection, $sql);
        if ($request) {
            echo "Package is available please procced to checkout";

        } else {
            echo "Insertion Failed: " . mysqli_error($connection);
        }
}else {
    echo 'Something went wrong, try again.';
}

mysqli_close($connection);  // Close the connection after done
?>
