<?php

function map_crate_line($line, $column_count=9)
{
    $crates = [];
    $crate_size = 3;
    $line_size = strlen($line);

    $i = 0;
    $column_number = 1;
    do {
        $tmp_crate = substr($line, $i, 3);
        if ($tmp_crate == '   ') $tmp_crate = '';
        $crates[$column_number] = $tmp_crate;
        $i+= 4;
        $column_number++;
    } while (count($crates) < $column_count);

    return $crates;
}

function create_moves($list) {
    $moves = [];
    $tmp_move = [];
    foreach ($list as $move) {
        if (preg_match_all('/[0-9]+/', $move, $tmp_move) !== 3) {
            continue;
        }
        $tmp = $tmp_move[0];
        $moves[] = ['amount' => $tmp[0], 'src' => $tmp[1], 'dst' => $tmp[2]];
    }

    return $moves;
}

function handle_move_9000(array &$map, array $move) {
    for ($i=0; $i<$move['amount']; $i++) {
        // pop one crate off
        $tmp_crate = array_pop($map[$move['src']]);
        // add it to the destination stack
        $map[$move['dst']][] = $tmp_crate;
    }

    return true;
}

function handle_move_9001(array &$map, array $move) {
    $tmp_list = [];

    // pop all crates like the 9000, but save them in a temporary stack
    for ($i=0; $i<$move['amount']; $i++) {
        $tmp_crate = array_pop($map[$move['src']]);
        $tmp_list[] = $tmp_crate;
    }
    // reverse the list to make it the same as getting all at once
    $tmp_list = array_reverse($tmp_list);
    // merge them on top of the existing stack
    $map[$move['dst']] = array_merge($map[$move['dst']], $tmp_list);

    return true;
}

function get_top_crates(array $map) {
    $str = '';

    foreach ($map as $column => $crates) {
        $last_crate = array_pop($crates);
        if (empty($last_crate)) {
            $str .= ' ';
            continue;
        }
        $str .= substr($last_crate, 1, 1); // get "content" from crate
    }

    return $str;
}