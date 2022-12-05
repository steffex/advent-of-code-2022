<?php
require '../functions.php';
require 'functions.php';

// read input file
$lines = read_input('input.txt', true);
$groups = array_chunk($lines, 3);

$total = 0;
foreach ($groups as $group) {
    $first = $group[0];
    $letters = str_split($first);
    $duplicates = [];
    foreach ($letters as $letter) {
        if (str_contains($group[1], $letter)) {
            $duplicates[] = $letter;
        }
    }

    $group_letter = '';
    foreach ($duplicates as $duplicate) {
        if (str_contains($group[2], $duplicate)) {
            $group_letter = $duplicate;
            break;
        }
    }

    $total += calculate_score($group_letter);
}

echo "Score: $total\n";
