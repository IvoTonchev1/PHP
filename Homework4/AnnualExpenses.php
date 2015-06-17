<!DOCTYPE html>
<html>
    <head>
        <title>Annual Expenses</title>
    </head>
    <body>
        <form method="post">
            <label for="year">Enter number of years:</label>
            <input type="text" name="year" id="year"/>
            <input type="submit" value="Show costs"/>
        </form>
        <br/>
        <?php
        if (isset($_POST["year"]) && !empty($_POST["year"])):
            $years = $_POST["year"];
            ?>
            <table border="1">
                <thead>
                <tr>
                    <th>Year</th>
                    <?php
                    for ($month = 1; $month <= 12; $month++) {
                        echo "<th>" . date("F", strtotime(date("d-$month-Y"))) . "</th>";
                    }
                    ?>
                    <th>Total:</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($year = 2015; $year > 2015 - $years; $year--) {
                    echo "<tr><td>$year</td>";
                    $total = 0;
                    for ($month = 1; $month <= 12; $month++) {
                        $currentCost = rand(0, 999);
                        echo "<td>" . $currentCost . "</td>";
                        $total += $currentCost;
                    }
                    echo "<td>$total</td></tr>";
                }
                ?>
                </tbody>
            </table>
        <?php endif; ?>
    </body>
</html>
