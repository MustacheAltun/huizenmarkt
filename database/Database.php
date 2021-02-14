<?php
global $conn;

//database settings
$host = "localhost";
$username= "root";
$password= "";
$dbname = "makelaar";

//maak de connectie nu
$conn = new mysqli("$host","$username","$password","$dbname");


// Checken naar de connectie
if ($conn -> connect_errno) {
    //de connectie is gefaald
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}else{
    //connectie is gelukt (voor troubleshooten zet je dan echo "gelukt";
}


?>