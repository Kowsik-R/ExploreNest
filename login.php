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
    $email = $_POST['email'];
    $psw =  $_POST['psw'];

    // Check if the user exists
    $sql = "SELECT * FROM userTable WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    // Insert the new user into the database
    if ( mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $old_psw = $row['psw'];
      $user_id = $row['id'];
      // Verify the password
      if ($old_psw==$psw) {
            echo "<script>
                alert('Welcome Back!');
                window.location.href = 'home.php?id=" . $user_id . "';
                </script>";
        } else {
            echo "<script>
                alert('Incorrect password!');
                window.location.href = 'login.php';
                </script>";
        }
  }else{
    $sql = "INSERT INTO userTable (email, psw) VALUES ('$email', '$psw')";
    $result = mysqli_query($connection, $sql);
    $last_id = mysqli_insert_id($connection);
    $sql = "INSERT INTO cart (userID) VALUES ('$last_id')";
    $result = mysqli_query($connection, $sql);
    echo "<script>
                alert('Welcome!');
                window.location.href = 'home.php?id=" . $last_id . "';
                </script>";

  }       
}
?>





</body>
</html>


</body>
</html>

