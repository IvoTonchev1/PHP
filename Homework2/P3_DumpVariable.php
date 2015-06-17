<?php
    getValueType("hello");
    getValueType(15);
    getValueType(1.234);
    getValueType(array(1,2,3));
    getValueType((object)[2,34]);

    function getValueType($variable){
        if (gettype($variable) == 'integer' || gettype($variable) == 'double') {
            echo var_dump($variable) . " ";
        } else {
            echo gettype($variable). " ";
        }
    }
?>