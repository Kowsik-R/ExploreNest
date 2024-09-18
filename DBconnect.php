<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ExploreNest';

// creating connection
$connection = new mysqli($servername, $username, $password);

// check connection
if ($connection -> connect_error) {
  die('Connection Failed: ' . $conn -> connect_error);
} else {
  mysqli_select_db($connection, $dbname);
}
?>

