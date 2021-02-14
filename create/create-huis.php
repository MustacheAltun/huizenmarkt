<?php
//haal alle gegevens op
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

//maak de connectie
include "../database/Database.php";

//check of de email correct is
if (filter_var($E_mail, FILTER_VALIDATE_EMAIL)){
    global $conn;
    //bereidt sql voor
    $sql = "INSERT INTO huis (`verdiepingen`, `kamers`, `prijs`, `vierkante-meters`, `status_IDstatus`, `breedte`, `hoogte`, `diepte`, `woonwijk_idwoonwijk`, `telefoonnummer`, `E-mail`) 
    VALUES 
    ('$verdiepingen', '$kamers', '$prijs', '$vierkante_meters', '$status_IDstatus', '$breedte', '$hoogte', '$diepte', '$woonwijk_idwoonwijk', '$telefoonnummer$isocode', '$E_mail')"
        .PHP_EOL;


// voer sql uit
    if ($conn->query($sql) === TRUE) {
        ?>
            <script>
                //huis is aangemaakt
                alert("huis is aangemaakt");
                location.href = '../index.php';
            </script>
        <?php
    } else {
        //huis is niet aangemaakt
        echo "Error: " . $sql . "<br>" . $conn->error.PHP_EOL;
    }
}else{
    //als de email incorrect is stuur hem terug
    ?>
    <script>
        alert("incorrect email");
        location.href = '../create/Create-formulier.php';
    </script>
    <?php
}
