<?php

function calculate_score(string $letter) {
    $item_types = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    return strpos($item_types, $letter) + 1;
}