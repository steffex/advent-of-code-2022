<?php
require '../functions.php';
require 'defines.php';
require 'day_functions.php';

function determine_move($move) {
    $moves = [
        MOVE_1 => ['A', 'X'],
        MOVE_2 => ['B', 'Y'],
        MOVE_3 => ['C', 'Z'],
    ];
    $the_move = '';
    foreach($moves as $move_name => $move_options) {
        if (in_array($move, $move_options)) {
            $the_move = $move_name;
            break;
        }
    }

    return $the_move;
}

// read input file
$plays = read_input('input.txt', true);

$total_score = 0;
foreach($plays as $play) {
    $play_parts = explode(' ', trim($play)); // 0=opponent, 1=self
    $opponent = determine_move($play_parts[0]);
    $self = determine_move($play_parts[1]);
    $play_score = determine_score($opponent, $self);
    $total_score += $play_score;
}

echo "the total score is $total_score!\n";
