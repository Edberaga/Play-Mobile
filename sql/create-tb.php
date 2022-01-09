<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "playmobile";

$handler = mysqli_connect($localhost, $username, $password, $dbname);

$the_query = "CREATE TABLE user (
    ID int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_Password LONGTEXT NOT NULL,
    mobile_number BIGINT(30))";
  
$checker= mysqli_query($handler, $the_query);

if(!$checker){
    echo("Error: ". mysqli_error($handler));
}
else {
    echo("Table has been created!");
}

?>