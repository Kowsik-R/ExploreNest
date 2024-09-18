<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="styles.css?v=1.1">
</head>
<body>
<!-- header section starts -->  
<?php include('design/header.php'); ?>

<!-- header section ends -->  





  <!-- Cart section starts -->


<div class="cart-table">
  <table style="width: 80%; margin: 0 auto; font-size: 1.3rem; text-align: right;">

    <thead>
      <tr>
        <td colspan="5">
          <h4 style="font-size: 2rem; text-align: center;">
            <p>Products in your cart!</p>
          </h4>
        </td>
      </tr>
    <tr style="font-size: 1.3rem; text-align: right;">
      <th style="padding-right: 20px;">Image</th>
      <th style="padding-right: 20px;">Name</th>
      <th style="padding-right: 20px;">Location</th>
      <th style="padding-right: 20px;">Price</th>
      <th style="padding-right: 20px;"></th>
      <th>
        <a href="action.php?clear=<?php echo $_GET['id']; ?>" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
      </tr>

    </thead>
    <tbody>
            <?php
                require 'DBconnect.php';
                $user_id=$_GET['id'];
                $sql = "SELECT * FROM added_to WHERE cartID = (SELECT id FROM cart WHERE userID = '$user_id')";
                $result = mysqli_query($connection, $sql);
                $grand_total = 0;
                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $product_code = $row['product_code'];
                      $qty = $row['qty'];
                      //cart id use korte hobe
                      $sql = "SELECT * FROM package where product_code='$product_code'";
                      $result1 = mysqli_query($connection, $sql);

                      while ($row1 = mysqli_fetch_assoc($result1)){
                        $product_price = $row1['product_price'];
                        $total_price = $product_price * $qty;
                        $grand_total += $total_price;       
              ?>
              <tr style="font-size: 1.5rem; text-align: center;">
                <td><img src="<?= $row1['product_image'] ?>" width="60"></td>
                <td><?= $row1['product_name'] ?></td>
                <td><?= $row1['loc'] ?></td>
                <input type="hidden" class="pprice" value="<?= $row1['product_price'] ?>">
                <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= $row1['product_price']*$row['qty'] ?></td>
                <td>

                <a href="action.php?remove=<?= $row1['product_code'] ?>&user_id=<?= $user_id ?>"
                    class="text-danger lead" 
                    onclick="return confirm('Are you sure you want to remove this item?');">
                    <i class="fas fa-trash-alt"></i>
                </a>              
                </td>
              </tr>
              <?php
                  }
                }
              }
              
              ?>
              <tr>
                <td colspan="3">
                  <a href="home.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= $grand_total ?></b></td>
                <td>
                <?php 
                  $flag = true;
                  if ($grand_total == 0) {
                      $flag = false;
                  }
                  if ($flag) {
                      ?>
                      <a href="book.php?id=<?= $user_id ?>&amount=<?= $grand_total ?>" class="btn btn-info">
                          <i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout
                      </a>
                  <?php 
                  } 
                  ?>

                </td>
              </tr>
    </tbody>
  </table>
</div>


<!-- cart section ends -->










<!-- footer section starts-->
<?php include('design/footer.php'); ?>

<!-- footer section ends-->
</body>
</html>