<?php
    session_start();
    include('P6_Countries.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Combo Box</title>
    </head>
    <body>
        <form action="" method="get" id="form">
            <select name="continents" id="selectBox" autofocus required onchange="document.getElementById('form').submit()" >
                <option value="" selected disabled></option>
                <option value="Europe">Europe</option>
                <option value="Asia">Asia</option>
                <option value="North America">North America</option>
                <option value="South America">South America</option>
                <option value="Australia and Oceania">Australia and Oceania</option>
                <option value="Africa">Africa</option>
            </select>
            <select name="countries" id="country" onchange="document.getElementById('form').submit()">
                <option value="" selected disabled></option>
                <?php
                    if (!empty($_GET) && isset($_GET['continents'])) {
                        $continent = $_GET['continents'];
                        $_SESSION['continents'] = $continent;
                        $countries = $countryList[$continent];
                        foreach ($countries as $value) {
                            echo "<option value='$value'>$value</option>";
                        }
                    }
                ?>
            </select>
        </form>
        <?php
            if (isset($_GET['countries'])) {
                $continent = $_SESSION['continents'];
                $country = $_GET['countries'];
                echo "You selected $country from $continent.";
            }
        ?>
    </body>
</html>
