<?php
require '../functions.php';

// read input file
$lines = read_input('input.txt', true);

function fully_contains($s, $t) {
    list($sf, $sl) = $s;
    list($tf, $tl) = $t;
    
    return ($sf <= $tf && $sl >= $tl);
}

function contains($s, $t) {
    list($sf, $sl) = $s;
    list($tf, $tl) = $t;

    $sr = range($sf, $sl);
    $tr = range($tf, $tl);

    foreach ($tr as $tn) {
        if (in_array($tn, $sr)) {
            return true;
            break;
        }
    }

    return false;
}

function get_pair_list(array $lines) {
    $pair_list = [];
    foreach ($lines as $line) {
        $pairs = explode(',', $line);
        $pair_arr = [];
        foreach ($pairs as $pair) {
            $start_end = explode('-', $pair);
            $pair_arr[] = $start_end;
        }
        $pair_list[] = $pair_arr;
    }

    return $pair_list;
}

$pair_list = get_pair_list($lines);

$counter = 0;
foreach ($pair_list as $ps) {
    if (fully_contains($ps[0], $ps[1]) || fully_contains($ps[1], $ps[0])) {
        $counter++;
    }
}

echo "Counter: $counter\n";

$counter2 = 0;
foreach ($pair_list as $ps) {
    if (contains($ps[0], $ps[1]) || contains($ps[1], $ps[0])) {
        $counter2++;
    }
}

echo "Counter2: $counter2\n";