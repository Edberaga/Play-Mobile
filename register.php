<?php
$name_error = "";
$pass_error = "";
$email_error = "";
$pass_error = "";
$pass2_error = "";

//for the validation
if(isset($_POST['register'])) {
    
    $flag_names = $flag_email = $flag_password = $flag_password2 = $flag_passwordmatch = true;
    if(empty($_POST["first-name"] || $_POST["last-name"])) {
        $name_error = "<i class='fas fa-exclamation-triangle'></i> Please enter your name.";
        $flag_names = false;
    }
    if(empty($_POST['email'])) {
        $email_error = "<i class='fas fa-exclamation-triangle'></i> Please enter the email";
        $flag_email = false;
    }

    if(empty($_POST['password'])) {
         $pass_error = "<i class='fas fa-exclamation-triangle'></i> Please enter your password";
         $flag_password = false;
    }

    if(empty($_POST['password2'])) {
        $pass2_error = "<i class='fas fa-exclamation-triangle'></i> Please enter to confirm your password";
        $flag_password2 = false;
    }

    if( $_POST['password2'] !== $_POST['password']){
        $pass2_error = "<i class='fas fa-exclamation-triangle'></i> The confirm password are incorrect!";
        $flag_passwordmatch = false;
    }

    if($flag_names && $flag_email && $flag_password && $flag_password2 && $flag_passwordmatch){

        //Well I suppose if everything its ok then redirects to this page.
            $localhost = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "playmobile";

            $handler = mysqli_connect($localhost, $username, $password, $dbname);

            if(isset($_POST['register'])){
                $firstname = $_POST['first-name'];
                $lastname = $_POST['last-name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $contact = $_POST['contact'];
                $gender = $_POST['gender'];

                $hass_password = md5($password); //password hashing
                $sql_query = "INSERT INTO user(first_name, last_name, user_email, user_Password, mobile_number) VALUES 
                ('$firstname', '$lastname', '$email', '$hass_password', '$contact')";
                
                echo($sql_query);

                if(mysqli_query($handler, $sql_query)){
                  header("location:registered.php");
                }

                else {
                    echo("Failed to register... : ". mysqli_error($handler));
                }
      }
    }
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
        <div class="register-header d-flex flex-column align-items-center py-5">
            <h1 class="font-rale text-dark gray-bg">
                Sign up
            </h1>
        </div>
        <form method="post" class="d-flex flex-column align-items-center py-5">
            <div class="my-2">
                <input type="text" class="name-input mx-1 p-2 border rounded" name="first-name" placeholder="First name">
                <input type="text" class="name-input mx-1 p-2 border rounded" name="last-name" placeholder="Last name">
            </div>
            <p class="text-danger"><?php echo $name_error;?></p>

            <div class="my-2 p-1">
                <input type="email" class="p-2 border rounded" name="email" placeholder="Your email">
            </div>
            <p class="text-danger"><?php echo $email_error;?></p>

            <div class="my-2 p-1">
                <input type="password" class="p-2 border rounded" name="password" placeholder="Your password">
            </div>
            <p class="text-danger"><?php echo $pass_error;?></p>

            <div class="my-2 p-1">
                <input type="password" class="p-2 border rounded" name="password2" placeholder="Confirm password">
            </div>
            <p class="text-danger"><?php echo $pass2_error;?></p>

            <div class="my-2 p-1">
                <input type="text" class="p-2 border rounded" name="contact" placeholder="Phone number (Optional)">
            </div>

            <button type="submit" name="register" class="my-3 btn btn-primary btn-lg">Register</button>
            <p>One of us? <a href="login.php" class="text-decoration-none">Sign in</a> here.</p>
        </form>
    </main>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>