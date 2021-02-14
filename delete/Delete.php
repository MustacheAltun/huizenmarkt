<?php
//haal de id op
$id= $_REQUEST["id"];

// maak de connectie
include "../database/Database.php";
global $conn;

// bereidt de sql voor om te verwijderen
$sql = "DELETE FROM huis WHERE IDhuis='$id'";

// sql wordt nu uitgevoerd
if ($conn->query($sql) === TRUE) {

    ?>
        <script>
            //sql query gelukt
            alert("huis is gedelete");
            location.href = '../index.php';
        </script>
    <?php
} else {
    //sql query niet gelukt
    echo "Error deleting record: " . $conn->error;
}

//database close
$conn->close();
?>