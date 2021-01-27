
<html>
<head>
    <link rel="stylesheet" href="../main.css">
</head>
<body>
<?php  include "../navigation.php";?>
<div class="form-style-5">
<form method="post" action="create-huis.php">
<!--    <fieldset>-->
        <legend><span class="number">1</span> Huis informatie</legend>
        verdiepingen: <input class="numberinput" type="number" name="verdiepingen" required>
        <br/>
        kamers: <input class="numberinput" type="number" name="kamers" required>
        <br/>
        prijs per m2: <input class="numberinput" type="number" name="prijs" required>
        <br/>
        vierkante meters: <input class="numberinput" type="number" name="vierkante_meters" required>
        <br/>
        breedte: <input class="numberinput" type="number" name="breedte" required>
        <br/>
        hoogte: <input class="numberinput" type="number" name="hoogte" required>
        <br/>
        diepte: <input class="numberinput" type="number" name="diepte" required>
        <br/>
        status:
        <select id="job" name="status_IDstatus">
            <optgroup label="huurhuis" >
                <option value=3>een huur huis gehuurd</option>
                <option value=2>een huur huis te huur</option>
            </optgroup>
            <optgroup label="koop huis">
                <option value=5 >een koop huis gekocht</option>
                <option value=4>een koop huis te koop</option>
            </optgroup>
        </select>
        woonwijk:
        <select id="job" name="woonwijk_idwoonwijk">
            <option value=4 >amsterdam</option>
            <option value=3>rotterdam</option>
        </select>
        telefoonnummer:
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
               required>
    </div>
    E-mail
    <input class="numberinput" type="email" name="E-mail" required>
    <br/>
    <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>
</div>
</body>
</html>
