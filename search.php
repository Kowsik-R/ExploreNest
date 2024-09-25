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
.btn {`
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

// Handling the sorting option order by##kowsik
$sort_order = "";
if (isset($_GET['sort'])) {
    $sort_option = $_GET['sort'];
    if ($sort_option == "low_high") {
        $sort_order = "ORDER BY product_price ASC";
    } elseif ($sort_option == "high_low") {
        $sort_order = "ORDER BY product_price DESC";
    }
}

if (isset($_GET['cs'])) {

    $q = $_GET['query'];
    $user_id = $_GET['id'];

    // Modified SQL query to include sorting ###KOWSIK
    $sql = "SELECT * FROM package WHERE product_name LIKE '%$q%' $sort_order;";
    $result = mysqli_query($connection, $sql);
?>

<!-- Form for sorting -->
<div class="container">
    <form action="" method="get" class="form-inline">
        <input type="hidden" name="cs" value="1">
        <input type="hidden" name="query" value="<?= htmlspecialchars($q) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user_id) ?>">
        
        <label for="sort" class="mr-2">Sort by Price:</label>
        <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
            <option value="">Select</option>
            <option value="low_high" <?= (isset($sort_option) && $sort_option == 'low_high') ? 'selected' : '' ?>>Low to High</option>
            <option value="high_low" <?= (isset($sort_option) && $sort_option == 'high_low') ? 'selected' : '' ?>>High to Low</option>
        </select>
    </form>
</div>

<section class="activities">
  <div class="box-container">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
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
    <?php endwhile; ?>
  </div>
</section>

<?php } ?>

<?php include './design/footer.php'; ?>
</body>
</html>
