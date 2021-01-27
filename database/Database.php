<?php
// connectie maken
global $conn;

$host = "localhost";
$username= "root";
$password= "";
$dbname = "makelaar";

$conn = new mysqli("$host","$username","$password","$dbname");


// Checken naar de connectie
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}else{

}


?>