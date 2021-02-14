
<html>
<head></head>
<body>
<?php
//implimenteer navigatiebar
include "../navigation.php";

// implimenteer database connectie
include "../database/Database.php";
global $conn;
$id= $_REQUEST["id"];

//haal de gegevens op
$sql = "SELECT * FROM huis LEFT JOIN (status, woonwijk)
                 ON (status.IDstatus = huis.status_IDstatus AND woonwijk.IDwoonwijk = huis.woonwijk_idwoonwijk) where IDhuis = $id";

//bereid de query voor
$result = $conn->query($sql);
?>

<!--zet alle gegevens in de formulier met een formulier-->
<div class="form-style-5">
    <form method="post" action="updatecode.php">
        <?php
        // execute de query
        $row = mysqli_fetch_array($result);

        //haal de telefoonnummer op en trim het zonder +316
        $telefoonnummer = $row["telefoonnummer"];
        $restphonenumber = substr("$telefoonnummer", 8, 9);  // returns 43456733 from +316 43456733
        ?>
            <fieldset>
                <legend><span class="number">1</span> Huis informatie</legend>
                <input type="hidden" name="id" value="<?php echo $row["IDhuis"]?>">
                verdiepingen: <input class="numberinput" type="number" name="verdiepingen" value="<?php echo $row["verdiepingen"]?>" required>
                <br/>
                kamers: <input class="numberinput" type="number" name="kamers" value="<?php echo $row["kamers"]?>" required>
                <br/>
                prijs per m2: <input class="numberinput" type="number" name="prijs" value="<?php echo $row["prijs"]?>" required>
                <br/>
                vierkante meters: <input class="numberinput" type="number" name="vierkante_meters" value="<?php echo $row["vierkante-meters"]?>" required>
                <br/>
                breedte: <input class="numberinput" type="number" name="breedte" value="<?php echo $row["breedte"]?>" required>
                <br/>
                hoogte: <input class="numberinput" type="number" name="hoogte" value="<?php echo $row["hoogte"]?>" required>
                <br/>
                diepte: <input class="numberinput" type="number" name="diepte" value="<?php echo $row["diepte"]?>" required>
                <br/>
                status:
                <select id="job" name="status_IDstatus">
                    <optgroup label="huurhuis" >
                        <option name="status_IDstatus" value=3 <?php if (isset($row["status_IDstatus"]) && $row["status_IDstatus"]=='3') {echo "selected";}?>>een huur huis gehuurd</option>
                        <option name="status_IDstatus" value=2 <?php if (isset($row["status_IDstatus"]) && $row["status_IDstatus"]=='2') {echo "selected";}?>>een huur huis te huur</option>
                    </optgroup>
                    <optgroup label="koop huis">
                        <option name="status_IDstatus" value=5 <?php if (isset($row["status_IDstatus"]) && $row["status_IDstatus"]=='5') {echo "selected";}?>>een koop huis gekocht</option>
                        <option name="status_IDstatus" value=4 <?php if (isset($row["status_IDstatus"]) && $row["status_IDstatus"]=='4') {echo "selected";}?>>een koop huis te koop</option>
                    </optgroup>
                </select>
                woonwijk:
                <select id="phonenumber" name="woonwijk_idwoonwijk">
                    <option name="woonwijk_idwoonwijk" value=4 <?php if ( $row["woonwijk_idwoonwijk"]==4){ echo "selected";}?>>amsterdam</option>
                    <option name="woonwijk_idwoonwijk" value=3 <?php if ( $row["woonwijk_idwoonwijk"]==3){ echo "selected";}?>>rotterdam</option>
                </select>
                <div>
                    <select id="phonenumber" name="isocode" required>
                        <option value= "+31 (0)6 " >+31 (0)6 </option>
                    </select>
                    <input
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="8"
                            class="phone-input"
                            type="number"
                            name="telefoonnummer"
                            value=<?php echo $restphonenumber?>
                            required>
                </div>
                E-mail
                <input class="numberinput" type="email" name="E-mail" value="<?php echo $row["E-mail"]?>" required>
                <br/>
                <input type="submit" name="submit" value="Submit">
            </fieldset>
    </form>
</div>
</form>
</body>
</html>
