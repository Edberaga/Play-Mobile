<?php
session_start();
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "playmobile";

//this variable need to be here, not at (isset['login'])
$error = "";

$handler = mysqli_connect($localhost, $username, $password, $dbname);

if(isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = $_POST['pass'];

  $password = md5($password); //for security
  $mail_query = "SELECT * FROM user WHERE user_email='$email'";
    $send_email_query = mysqli_query($handler, $mail_query);

    //This will be used to return a number row if the '$send_email_query' succesfully found one.
    $email_in_database = mysqli_num_rows($send_email_query);

  //To find the password value and validation
  $pass_query = "SELECT * FROM user WHERE user_password='$password'";
    //This variable will execute the query function, and pass the query to the database from $handler. This will check if the user_email row
    //has the form email
    $send_password_query = mysqli_query($handler, $pass_query);

    //This will be used to return a number row if the '$send_email_query' succesfully found one.
    $password_in_database = mysqli_num_rows($send_password_query);

  //the condition for validation
  if($email_in_database > 0) 
  {
    //When the email and password was founded. It will succed and lead to logined.php
    if($password_in_database > 0) 
    {
      $_SESSION['email'] = $_POST['email'];
      
      //the time function return the current time since session start in number of seconds.
      $_SESSION['time'] = time();
      //once every input is correct. Head to the logined and begun the timestamp of the session.
      header("location:logined.php");
    }
    else
    {
      $error="<button type='button' class='btn btn-outline-danger'><i class='fas fa-exclamation-triangle px-1'></i>Invalid Password!</button>";
    }
  }
  else
  {
    $error="<button type='button' class='btn btn-outline-danger'><i class='fas fa-exclamation-triangle px-1'></i>Invalid Account!</button>";
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

            <?php echo $error;?>

            <div class="my-2 p-1">
                <input type="text" class="p-2 border rounded" name="email" placeholder="Your email" >
            </div>

            <div class="my-2 p-1">
                <input type="password" class="p-2 border rounded" name="pass" placeholder="Your password">
            </div>

            <button type="submit" name="login" class="my-3 btn btn-primary btn-lg">Login</button>
            <p>New Here? <a href="register.php" class="text-decoration-none">Sign up</a> here.</p>
        </form>
    </main>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>