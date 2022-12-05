<?php
require '../functions.php';
require 'defines.php';
require 'day_functions.php';

function determine_move($move) {
    $moves = [
        MOVE_1 => 'A',
        MOVE_2 => 'B',
        MOVE_3 => 'C',
    ];
    $the_move = array_search($move, $moves);

    return $the_move;
}

function pick_move(array $play_parts) {
    $move = determine_move($play_parts[0]);
    $outcome = $play_parts[1];
    $self = '';

    switch($outcome) {
        case 'Y':
            // need to draw
            return $move;
            break;
        case 'Z':
            // need to win
            if ($move == MOVE_1) {
                $self = MOVE_2;
            } elseif ($move == MOVE_2) {
                $self = MOVE_3;
            } elseif ($move == MOVE_3) {
                $self = MOVE_1;
            }
            break;
        case 'X':
            if ($move == MOVE_1) {
                $self = MOVE_3;
            } elseif ($move == MOVE_2) {
                $self = MOVE_1;
            } elseif ($move == MOVE_3) {
                $self = MOVE_2;
            }
            break;
    }

    return $self;
}

// read input file
$plays = read_input('input.txt', true);

$total_score = 0;
foreach($plays as $play) {
    $play_parts = explode(' ', trim($play)); // 0=opponent, 1=self
    $opponent = determine_move($play_parts[0]);
    $self = pick_move($play_parts);
    $play_score = determine_score($opponent, $self);
    $total_score += $play_score;
}

echo "the total score is $total_score!\n";
