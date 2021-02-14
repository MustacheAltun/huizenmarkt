<?php
//haal alle gegevens op van de formulier
$id= $_REQUEST["id"];
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

// haal de database op en maak de connectie
include "../database/Database.php";
global $conn;

// check of de email correct is en zo niet, stuur hem terug
// als de email correct is bereidt de sql voor
if (filter_var($E_mail, FILTER_VALIDATE_EMAIL)) {
    $sql = "UPDATE huis SET 
`verdiepingen` = '$verdiepingen', 
`kamers` = '$kamers', 
`prijs` = '$prijs',
`vierkante-meters` = '$vierkante_meters',
`status_IDstatus` = '$status_IDstatus',
`breedte` = '$breedte',
`hoogte` = '$hoogte',
`diepte` = '$diepte',
`woonwijk_idwoonwijk` = '$woonwijk_idwoonwijk',
`telefoonnummer` = '$telefoonnummer$isocode',
`E-mail` = '$E_mail'
    WHERE IDhuis= '$id'";



//voer de sql query uit
    if ($conn->query($sql) === TRUE) {
        ?>
            <script>
                //het is geupdate en gaat terug naar index
                alert("huis is geupdate");
                location.href = '../index.php';
            </script>
        <?php
    } else {
        //als er een probleem is geeft hij de error
        echo "Error updating record: " . $conn->error;
    }

    //sluit de connectie nu
    $conn->close();
}else{
    ?>
    <script>
        //email incorrect ga terug naar update formulier en typ een correcte email
        alert("incorrect email");
        location.href = '../update/Updateformulier.php?id=<?php echo $id?>';
    </script>
    <?php
}
?>