<?php
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

// Create connection
include "../database/Database.php";
global $conn;

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




    if ($conn->query($sql) === TRUE) {
        ?>
            <script>
                alert("huis is geupdate");
                location.href = '../index.php';
            </script>
        <?php
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}else{
    ?>
    <script
        type="text/javascript">location.href = '../update/Updateformulier.php?id=<?php echo $id?>';
        alert("incorrect email");
    </script>
    <?php
}
?>