<?php

$id= $_REQUEST["id"];

// Create connection
include "../database/Database.php";
global $conn;

// sql to delete a record
$sql = "DELETE FROM huis WHERE IDhuis='$id'";

if ($conn->query($sql) === TRUE) {

    ?>
        <script>
                alert("huis is gedelete");
            location.href = '../index.php';
        </script>
    <?php
//    header( "Location: ../index.php" );

} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>