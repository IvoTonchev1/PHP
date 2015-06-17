<!DOCTYPE html>
<html>
    <head>
        <title>Most Frequent Tag</title>
    </head>
    <body>
        <form method="post">
            <label for="tags">Enter Tags:</label><br/>
            <input type="text" name="tags"/>
            <input type="submit" name="submit"/><br/>
            <?php
                if(isset($_POST['submit'])){
                    if(isset($_POST['tags'])) {
                        $tags = explode(", ", $_POST["tags"]);
                        $count = array();
                        foreach ($tags as $tag) {
                            if (!isset($count[$tag])) {
                                $count[$tag] = 1;
                            } else {
                                $count[$tag]++;
                            }
                        }
                        arsort($count);
                        echo "<div id=\"result\">";
                        foreach ($count as $key => $value) {
                            echo $key . " : " . $value . " time" . ($value == 1 ? "" : "s") . "<br />";
                        }
                        echo "Most frequent tag is: " . array_keys($count)[0];
                        echo "</div>";
                    }
                }
            ?>
        </form>
    </body>
</html>
