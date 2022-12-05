<?php
require '../functions.php';
require 'functions.php';

function get_compartments(string $rucksack) {
    return str_split($rucksack, (strlen($rucksack) / 2));
}

function find_duplicates(string $rucksack) {
    $compartments = get_compartments($rucksack);
    $duplicates = [];
    $compartment = str_split($compartments[0]);
    foreach ($compartment as $letter) {
        if (str_contains($compartments[1], $letter)) {
            $duplicates[] = $letter;
        }
    }

    return array_unique($duplicates);
}

// read input file
$lines = read_input('input.txt', true);
$total = 0;
foreach ($lines as $rucksack) {
    $duplicates = find_duplicates($rucksack);
    foreach ($duplicates as $letter) {
        $total += calculate_score($letter);
    }
}

echo "Score: $total\n";
