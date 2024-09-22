<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search the khoj</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    

</head>
<body>

<style>

.activities {
    padding: 20px;
    background-color: #f9f9f9;
}
.box-container {
    display: flex;
    flex-wrap: wrap;
}
.box {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 10px;
    width: 300px;
}
.image img {
    max-width: 100%;
    height: auto;
}
.content h3 {
    font-size: 18px;
    font-weight: bold;
}
.btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}
.btn:hover {
    background-color: #0056b3;
}
</style>


<?php
include './design/header.php'; 
include 'DBconnect.php';

if (isset($_GET['cs'])) {

    $q = $_GET['query'];
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM package WHERE product_name LIKE '%$q%';";
    $result = mysqli_query($connection, $sql);

    //  result
    while ($row = mysqli_fetch_assoc($result)):
?>

<section class="activities">
  <div class="box-container">
    <div class="box">
      <div class="image">
        <img src="<?= $row['product_image'] ?>" alt="">
      </div>
      <div class="content">
        <h3><?= $row['product_name'] ?></h3>
        <h3><i class="fas fa-dollar-sign"></i><?= $row['product_price'] ?></h3>
        
        <!-- Form for adding the item to the cart -->
        <form action="" method="post" class="addItem">
          <input type="hidden" name="pcode" value="<?= $row['product_code'] ?>">
          <p>Pick-up Date:</p>
          <input type="date" name="arrival" required>
          <p>Return Date:</p>
          <input type="date" name="leaving" required><br>
          <h3><?= $row['loc'] ?></h3>
          <input type="submit" value="Add to the cart" class="btn" name="addItem">
        </form>
      </div>
    </div>
  </div>
</section>

<?php endwhile; } ?>

<?php

include './design/footer.php'; 
?>

</body>
</html>
