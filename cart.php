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
    <title>Play Mobile - Cart</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--FontAwesome-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
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

    <!-- Shopping cart section  -->
    <section id="cart" class="py-4">
        <div class="container-fluid">
            <h5 class="font-size-20">Shopping Cart</h5>

             <!--  shopping cart items   -->
            <div class="row p-2">
                <div class="col-sm-9">
                    <table class="table ml-2 mr-2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_SESSION['cart']))
                                {
                                    //Assign the variable ['cart-product'] array to $key on each $product
                                    foreach($_SESSION['cart'] as $key => $item) 
                                    {
                                        $no = $key + 1;
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>$item[item_name]</td>
                                                <td>$item[item_price]<input type='hidden' id='only-number-input' class='cart_price' value='$item[item_price]'></td>
                                                <td><input type='number' class='text-center cart_qty' onchange='subTotal()' value='$item[qty]' min='1' max='10'></td>
                                                <td class='cart_total'></td>
                                                <td>
                                                    <form action ='manage-cart.php' method='post'>
                                                        <button class='btn btn-sm btn-outline-danger' name='remove'>REMOVE</button>
                                                        <input type='hidden' name='item_name' value='$item[item_name]'>
                                                    </form>
                                                </td>
                                            </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <form action ='manage-cart.php' class="py-5" method='post'>
                        <button class='btn btn-lg btn-outline-info' name='reset'>Reset Cart</button>
                    </form>
                </div>
                <!--Subtotal item-->
                <div class="col-sm-3 py-3">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                        <div class="border-top py-4">
                            <h5 class="font-baloo font-size-20">Subtotal 
                                <p class="text-danger" id="sub_total"></p></span>
                            </h5>
                            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--Index.js for product backend-->
    <script type="text/javascript" src="index.js"></script>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>