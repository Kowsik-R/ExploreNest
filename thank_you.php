<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Link to a CSS file for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #8e44ad;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #8e44ad;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
    } 
    ?>

    <div class="container">
        <h1>Thank You!</h1>
        <p>Your order has been placed successfully.</p>
        <a href="home.php?id=<?php echo $_GET['id']; ?>">Return to Homepage</a>
    </div>
</body>
</html>
