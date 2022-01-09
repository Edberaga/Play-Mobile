<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";

$handler = mysqli_connect($localhost, $username, $password); //hostname, admin name, password
$query = mysqli_query($handler, 'CREATE DATABASE playmobile');

if (!$query) {
    echo "Error: ".mysqli_error($handler);
} 
else {
    echo "Database has been created!";
}

?>