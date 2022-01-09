<?php
if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];
    $head = "From: ".$mail;

    mail($mail, $sub, $msg, $head);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/Icon.png">
  <link rel="stylesheet" href="style.css" type="text/css">
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
        <li class="nav-item active">
          <a class="nav-link active" href="contact.php">Contact</a>
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

<div class="register-header d-flex flex-column align-items-center py-5">
        <h1 class="font-rale text-dark gray-bg">
            Gamers are Connected.
        </h1>
        <h5>We can always have a chat. Leave some message here.</h5>
</div>
    
    <form method="post" class="d-flex flex-column align-items-center py-3">
            <div class="my-2 p-1">
                <input type="text" class="p-2 border rounded" name="name" placeholder="Your name" required>
            </div>
            <div class="my-2 p-1">
                <input type="email" class="p-2 border rounded" name="email" placeholder="Your email" required>
            </div>

            <div class="my-2 p-1">
                <input type="text" class="p-2 border rounded" name="subject" placeholder="Subject">
            </div>

            <div class="my-2 p-1">
                <textarea name="msg" class="p-2 border rounded" rows="5" cols="51" placeholder="Your chat..."></textarea>
            </div>

            <button type="submit" name="send" class="my-2 btn btn-primary btn-lg">Send</button>
        </form>
</body>
</html>