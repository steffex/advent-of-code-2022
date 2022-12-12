<?php
require '../functions.php';
require 'functions.php';

// read input file
$lines = read_input('input.txt', true);

$crate_rows = 8;
$crate_columns = 9;

$crate_config = array_slice($lines, 0, $crate_rows);
$crate_config = array_reverse($crate_config);
$crate_map = [];

foreach ($crate_config as $crate_line) {
    $crates = map_crate_line($crate_line, $crate_columns);
    foreach ($crates as $column => $crate) {
        if (empty($crate)) continue;
        $crate_map[$column][] = $crate;
    }
}

$moves_list = create_moves(array_slice($lines, 10));
foreach ($moves_list as $index => $move) {
    // handle_move_9000($crate_map, $move);
    handle_move_9001($crate_map, $move);
}

$output = get_top_crates($crate_map);

echo "Answer: '$output'\n";