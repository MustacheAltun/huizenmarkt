
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../main.css">
</head>

<!--haal de navigatiebar op-->
<?php include "../navigation.php"; ?>



<nav>
    <ul>
<!--        links met filters voor huizen-->
        <li><a href="?Koopwoning">koopwoning</a></li>
        <li><a href="?Huurwoning">huurwoning</a></li>
        <li><a href="?Normaal">totaal overzicht</a></li>
    </ul>
</nav>

<?php
//voer de read functie uit
Read();

function Read(){
    //haal de database connectie op
    include "../database/Database.php";
    global $conn;

    // bereidt de sql voor met de juist filter erop
    if (isset($_GET['Koopwoning'])){
        $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk) where `huur-of-koopwoning` = 'koop woning'";
    }else if (isset($_GET['Huurwoning'])){
        $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk) where `huur-of-koopwoning` = 'huur woning'";
    }else{
        $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk)";
    }

    //methode 2 om te updaten
    //$sql = "SELECT * FROM huis, status, woonwijk WHERE huis.status_IDstatus = status.IDstatus AND huis.woonwijk_idwoonwijk = woonwijk.IDwoonwijk";

    //voer de sql uit
    $result = $conn->query($sql);

    //haal de data op totdat er geen data meer is om op te halen
    if ($result->num_rows > 0) {
        echo " <div class='table-responsive'> <table class='table table-striped table-bordered table-responsive'>
            <tr>
                <th>huisnummer</th>
                <th>telefoonnummer</th>
                <th>E-mail</th>
                <th>verdiepingen</th>
                <th>kamers</th>
                <th>prijs per m2</th>
                <th>vierkante meters</th>
                <th>totaal prijs</th>
                <th>status</th>
                <th>breedte</th>
                <th>hoogte</th>
                <th>diepte</th>
                <th>woonwijk</th>
                <th>status</th>
                <th>woningtype</th>
                <th>update</th>
                <th>delete</th>
            </tr>";

        // hier komt de data die opgehaald wordt
        while($row = mysqli_fetch_array($result)) {
            $id = $row["IDhuis"];
            echo "<tr><td>" .$row["IDhuis"]."</td>",
                "<td>" .$row["telefoonnummer"]."</td>",
                "<td>" .$row["E-mail"]."</td>",
                "<td>" .$row["verdiepingen"]."</td>",
                "<td>" .$row["kamers"]."</td>",
                "<td>€" .$row["prijs"]."</td>",
                "<td>" .$row["vierkante-meters"]." m2</td>",
                "<td>€" .$row["prijs"]*$row["vierkante-meters"]."</td>",
                "<td>" .$row["status"]."</td>",
                "<td>" .$row["breedte"]." m</td>",
                "<td>" .$row["hoogte"]." m</td>",
                "<td>" .$row["diepte"]." m</td>",
                "<td>" .$row["woonwijk"]."</td>",
                "<td>" .$row["status"]."</td>",
                "<td>" .$row["huur-of-koopwoning"]."</td>";?>
            <td><input class="button" type="button" value="update" onclick="location.href='../update/Updateformulier.php?id=<?php echo $id?>';"/></td>
            <td><input class="button" type="button" value="delete" onclick="location.href='../delete/Delete.php?id=<?php echo $id?>';"/></td>
            <?php

        }
        echo " </table></div>";
    } else {
        // en als er geen data gevonden kan worden doet hij dit
        echo "0 results";
    }
    ?>

    <?php
    //sluit connectie
    $conn->close();
}

?>

</body>
</html>