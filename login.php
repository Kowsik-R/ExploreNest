<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #8e44ad;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}



.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
    display: block;
}

</style>
</head>
<body>

<h2>Login Form</h2>

<form action="" method="post" class="login">
  <div class="imgcontainer">
    <img src="pic/log.jpg" alt="">
  </div>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      
    <button type="submit" name="login" class="button">Login</button>
  </div>
  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('DBconnect.php');
    

    // Secure password hashing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $psw = password_hash(mysqli_real_escape_string($connection, $_POST['psw']), PASSWORD_BCRYPT);

    // Insert the new user into the database
    $sql = "INSERT INTO userTable (email, psw) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $psw);
    
    if (mysqli_stmt_execute($stmt)) {
        // Get the ID of the newly inserted user
        $last_id = mysqli_insert_id($connection);
        $sql = "INSERT INTO cart (userID) VALUES ('$last_id')";
        $result = mysqli_query($connection, $sql);

        // Redirect to another page with user ID
        header("Location: home.php?id=" . $last_id);
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>

</body>
</html>


</body>
</html>

