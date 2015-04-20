<?php
include('06-Countries.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Combo Box</title>
</head>
<body>
<form method="get" id="form">
    <select name="continents" required onchange="document.getElementById('form').submit()">
        <option hidden></option>
        <?=
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "Europe" ? 'selected' : '',
        " value='Europe'>Europe</option><br/>",
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "Asia" ? 'selected' : '',
        " value='Asia'>Asia</option><br/>",
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "North America" ? 'selected' : '',
        " value='North America'>North America</option><br/>",
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "South America" ? 'selected' : '',
        " value='South America'>South America</option><br/>",
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "Australia and Oceania" ? 'selected' : '',
        " value='Australia and Oceania'>Australia and Oceania</option><br/>",
        "<option ", isset($_GET['continents']) && $_GET['continents'] == "Africa" ? 'selected' : '',
        " value='Africa'>Africa</option><br/>"
        ?>
    </select>
    <select>
        <option hidden></option>
        <?php
        if(isset($_GET['continents'])) {
            $countries = $countryList[$_GET['continents']];
            foreach ($countries as $value) {
                echo "<option value='$value'>$value</option><br/>";
            }
        }
        ?>
    </select>
</form>
</body>
</html>