<?php
$url= "../index.php";
$verdiepingen= $_POST['verdiepingen'];
$kamers= $_POST['kamers'];
$prijs= $_POST['prijs'];
$status_IDstatus= $_POST['status_IDstatus'];
$vierkante_meters= $_POST['vierkante_meters'];
$breedte= $_POST['breedte'];
$hoogte= $_POST['hoogte'];
$diepte= $_POST['diepte'];
$woonwijk_idwoonwijk= $_POST['woonwijk_idwoonwijk'];
$telefoonnummer = $_POST['isocode'];
$isocode = $_POST['telefoonnummer'];
$E_mail = $_POST['E-mail'];

//connectie maken
include "../database/Database.php";


if (filter_var($E_mail, FILTER_VALIDATE_EMAIL)){
    global $conn;
    $sql = "INSERT INTO huis (`verdiepingen`, `kamers`, `prijs`, `vierkante-meters`, `status_IDstatus`, `breedte`, `hoogte`, `diepte`, `woonwijk_idwoonwijk`, `telefoonnummer`, `E-mail`) 
    VALUES 
    ('$verdiepingen', '$kamers', '$prijs', '$vierkante_meters', '$status_IDstatus', '$breedte', '$hoogte', '$diepte', '$woonwijk_idwoonwijk', '$telefoonnummer$isocode', '$E_mail')"
        .PHP_EOL;


// reactie of het is gelukt
    if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully".PHP_EOL;
        ?>
            <script>
                alert("huis is aangemaakt");
                location.href = '../index.php';
            </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error.PHP_EOL;
    }
}else{
    ?>
    <script>
        alert("incorrect email");
        location.href = '../create/Create-formulier.php';
    </script>
    <?php
}
