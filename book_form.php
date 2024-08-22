<?php
session_start();  // Start the session

$connection = mysqli_connect('localhost', 'root', '', 'ExploreNest');

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
    $location = $_POST['location'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $price = $_POST['price'];


    $start_date = strtotime($arrivals);
    $end_date = strtotime($leaving);
    $dates_array = array();

    while ($start_date < $end_date) {
        $dates_array[] = date("m-d-Y", $start_date);
        $start_date = strtotime("+1 day", $start_date);
    }

    $sql = "SELECT arrival, leaving FROM book_form";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $is_available = true;

        foreach ($dates_array as $i) {
            $c = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $start_date = strtotime($row['arrival']);
                $end_date = strtotime($row['leaving']);

                while ($start_date < $end_date) {
                    if ($i == date("m-d-Y", $start_date)) {
                        $c++;
                    }
                    $start_date = strtotime("+1 day", $start_date);
                }
                if ($c >= 5) {
                    echo "Not available on date: " . $i . "<br>";
                    $is_available = false;
                    break 2;  // Exit both loops
                }
            }
            // Reset the pointer to the beginning for the next date check
            mysqli_data_seek($result, 0);
        }

        if ($is_available) {
            $sql1 = "SELECT email FROM book_form";
            $result1 = mysqli_query($connection, $sql1);
            $discount = true;
            while ($row = mysqli_fetch_assoc($result1)) {
                if ($row['email']==$email){
                    $discount = false;
                    break;
                }
            }
            if ($discount){
                $price = $price - $price * (15/100);
            }
            $request = "INSERT INTO book_form (fname, lname, email, phone, address, location, arrival, leaving, price) 
                        VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$location', '$arrivals', '$leaving','$price')";

            if (mysqli_query($connection, $request)) {
                echo "Package is available please procced to checkout";
            } else {
                echo "Insertion Failed: " . mysqli_error($connection);
            }
        }
    } else {
        $sql = "SELECT email FROM book_form";
        $result = mysqli_query($connection, $sql);
        $discount = true;
        while ($row1 = mysqli_fetch_assoc($result)) {
            if ($row1['email']==$email){
                $discount = false;
                exit();
            }
        }
        if ($discount){
            $price = $price - $price * (15/100);
        }

        // If no bookings exist, you can directly insert the new booking
        $request = "INSERT INTO book_form (fname, lname, email, phone, address, location, arrival, leaving, price) 
                    VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$location', '$arrivals', '$leaving','$price')";

        if (mysqli_query($connection, $request)) {
            echo "Package is available please procced to checkout";

        } else {
            echo "Insertion Failed: " . mysqli_error($connection);
        }
    }
} else {
    echo 'Something went wrong, try again.';
}

mysqli_close($connection);  // Close the connection after done
?>
