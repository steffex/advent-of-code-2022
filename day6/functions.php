<?php

function find_marker($buffer, $len) {
    for ($i=0; $i < strlen($buffer); $i++) {
        $packet = str_split(substr($buffer, $i, $len));
        if (count(array_unique($packet)) == $len) {
            return $i + $len;
        }
    }
    
    return false;
}