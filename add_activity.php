<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <title>ExploreNest</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav_logo">
          <h1><a href="home.php">ExploreNest</a></h1>
        </div>
      </nav>
    </header>
    <main>
      <section class="add">
        <div class="box">
          <h1>Add Activitiy</h1>
          <form class="add_form" action="insert.php" method="post">
            Product ID: <input type="text" name="product_id" required> 
			      Product Name: <input type="text" name="product_name" required> 
            Product Price: <input type="number" name="product_price" required> 
            Product Image: <input type="file" name="product_image" accept="image/*" required>
            Product Location:  <input type="text" name="loc" required>
            <input type="submit" class="btn" />
          </form>
        </div>
      </section>
    </main>
  </body>
</html>
