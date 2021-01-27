
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>


<?php include "../navigation.php"; ?>



<nav>
    <ul>
        <li><a href="?Koopwoning">koopwoning</a></li>
        <li><a href="?Huurwoning">huurwoning</a></li>
        <li><a href="?Normaal">totaal overzicht</a></li>
    </ul>
</nav>

<?php
if (isset($_GET['Koopwoning'])) {Koopwoning();}
else if (isset($_GET['Huurwoning'])) {Huurwoning();}
else {Normaal();}


function Normaal(){
    include "../database/Database.php";
    global $conn;

    $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk)";


    //methode 2 om te updaten
    //$sql = "SELECT * FROM huis, status, woonwijk WHERE huis.status_IDstatus = status.IDstatus AND huis.woonwijk_idwoonwijk = woonwijk.IDwoonwijk";

    $result = $conn->query($sql);

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

        // output data of each row

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
        echo "0 results";
    }
    ?>

    <?php
    $conn->close();
}
function Koopwoning(){
    include "../database/Database.php";
    global $conn;
    $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk) where `huur-of-koopwoning` = 'koop woning'";

    //methode 2 om te updaten
    //SELECT * FROM huis, status, woonwijk WHERE huis.status_IDstatus = status.IDstatus AND huis.woonwijk_idwoonwijk = woonwijk.IDwoonwijk

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "  <table class='table table-striped table-bordered table-responsive' >
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

        // output data of each row

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
        echo " </table>";
    } else {
        echo "0 results";
    }
    ?>

    <?php
    $conn->close();
}
function Huurwoning(){
    include "../database/Database.php";
    global $conn;
    $sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
           ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk) where `huur-of-koopwoning` = 'huur woning'";

    //methode 2 om te updaten
    //SELECT * FROM huis, status, woonwijk WHERE huis.status_IDstatus = status.IDstatus AND huis.woonwijk_idwoonwijk = woonwijk.IDwoonwijk

    $result = $conn->query($sql);

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

        // output data of each row

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
        echo "0 results";
    }
    ?>

    <?php
    $conn->close();
}

?>

</script>
</body>
</html>