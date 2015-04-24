<?php
include('06-Countries.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Combo Box</title>
    <style>
        select {
            width:250px;
        }
    </style>
</head>
<body>
<form method="get" id="form">
    <select name="continents" id="continents" required onchange="document.getElementById('form').submit()">
        <option disabled selected>Select Continent</option>
        <option value='1'>Europe</option>
        <option value='2'>Asia</option>
        <option value='3'>North America</option>
        <option value='4'>South America</option>
        <option value='5'>Australia and Oceania</option>
        <option value='6'>Africa</option>
    </select>
    <script>
        if(<?=isset($_GET['continents'])?>) {
            document.getElementById("continents").selectedIndex = <?=$_GET['continents']?>;
        }
    </script>
    <select>
        <option disabled selected>Select Country</option>
        <?php
        if(isset($_GET['continents'])){
            $countries = $countryList[$_GET['continents']];
            foreach ($countries as $country) {
                echo "<option value='$country'>$country</option>";
            }
        }
        ?>
    </select>
</form>
</body>
</html>