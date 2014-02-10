<?php

function checkInput($str) {
        $str = @strip_tags($str);
        $str = @stripslashes($str);
        return $str;
    }

?>