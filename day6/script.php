<?php
require '../functions.php';
require 'functions.php';

// read input file
$lines = read_input('input.txt', true);
$buffer = $lines[0];

$output1 = find_marker($buffer, 4);
$output2 = find_marker($buffer, 14);

echo "Answer part1: '$output1'\n";
echo "Answer part2: '$output2'\n";