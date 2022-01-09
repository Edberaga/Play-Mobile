<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/Icon.png">
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!--Latest version for jquery, popper js, and bootstrap js-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!--FontAwesome-->  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <title>Play Mobile</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
    <a class="navbar-brand">
      <img src="images/logo.png" width="250px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">On Sale</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Coming Soon</a>
        </li>
      </ul>

        <div class="px-3 py-2">
          <a href="login.php" class="text-decoration-none text-white">Login</a>
        </div>
        <div class="px-3 py-2">
          <a href="register.php" class="text-decoration-none text-white">Register</a>
        </div>

        <div class="font-size-20 px-3 py-2 btn btn-light">
          <?php
            $count=0;
            if(isset($_SESSION['cart'])){
              //count how much the item on the cart
              $count= count($_SESSION['cart']);
            }
          ?>
            <a href="cart.php"><span class="font-size-20 text-black"><i class="fas fa-shopping-cart"></i></a></span>
            <span class="px-3 py-2 text-dark"><?php echo $count;?></span>
        </div>
    </div>
  </nav>

  <main>
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-3">
          <form action="manage-cart.php" method="post">
            <div class="card">
              <img src="images/oppo.jpg" class="card-img-top">
              <div class="card-body text-center">
                <h5 class="card-title">Oppo A95</h5>
                <p class="card-text">RM 1030</p>
                <button type="submit" name="add_to_cart" class="btn btn-warning">Add to Cart</button>
                <input type="hidden" name="item_name" value="Oppo A95">
                <input type="hidden" name="item_price" value="1030">
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-3">
          <form action="manage-cart.php" method="post">
            <div class="card">
              <img src="images/redmi.jpg" class="card-img-top">
              <div class="card-body text-center">
                <h5 class="card-title">Xiaomi Redmi 9A</h5>
                <p class="card-text">RM 520</p>
                <button type="submit" name="add_to_cart" class="btn btn-warning">Add to Cart</button>
                <input type="hidden" name="item_name" value="Xiaomi Redmi 9a">
                <input type="hidden" name="item_price" value="520">
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-3">
          <form action="manage-cart.php" method="post">
            <div class="card">
              <img src="images/samsung.jpg" class="card-img-top">
              <div class="card-body text-center">
                <h5 class="card-title">Samsung Galaxy S12</h5>
                <p class="card-text">RM 1190</p>
                <button type="submit" name="add_to_cart" class="btn btn-warning">Add to Cart</button>
                <input type="hidden" name="item_name" value="Samsung Galaxy S12">
                <input type="hidden" name="item_price" value="1190">
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-3">
          <form action="manage-cart.php" method="post">
            <div class="card">
              <img src="images/apple.jpg" class="card-img-top">
              <div class="card-body text-center">
                <h5 class="card-title">iPhone 12 Pro</h5>
                <p class="card-text">RM 2530</p>
                <button type="submit" name="add_to_cart" class="btn btn-warning">Add to Cart</button>
                <input type="hidden" name="item_name" value="iPhone 12 Pro">
                <input type="hidden" name="item_price" value="2530">
              </div>
            </div>
          </form>
        </div>
      </div>
  </main>
</body>

</html>