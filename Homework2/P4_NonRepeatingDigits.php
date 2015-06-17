<?php
    $integer = 247;
    $arrayOfNumbers = array();
    $numberFound;

    if ($integer < 102) {
        $numberFound = FALSE;
    } elseif ($integer > 101 && $integer < 999) {
        for ($i=102; $i <= $integer; $i++) {
            if (checkNumber($i)) {
                array_push($arrayOfNumbers, $i);
                $numberFound = TRUE;
            }
        }
    } elseif ($integer > 101 && $integer >= 999) {
        for ($i=102; $i < 999; $i++) {
            if (checkNumber($i)) {
                array_push($arrayOfNumbers, $i);
                $numberFound = TRUE;
            }
        }
    }

    if (!$numberFound) {
        echo "no";
    } else {
        $result = implode(', ', $arrayOfNumbers);
        echo $result;
    }


    function checkNumber($number){
        $string = (string)$number;
        $firstDigit = $string[0];
        $secondDigit = $string[1];
        $thirdDigit = $string[2];
        if ($firstDigit != $secondDigit && $secondDigit != $thirdDigit && $firstDigit != $thirdDigit) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
?>
