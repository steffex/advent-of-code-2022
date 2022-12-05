<?php

function determine_score($opponent, $self) {
    $move_score = [
        MOVE_1 => 1,
        MOVE_2 => 2,
        MOVE_3 => 3,
    ];
    $score = 0;
    
    $move_self_score = $move_score[$self];
    
    if ($opponent == $self) {
        // draw
        $score += SCORE_DRAW;
    } elseif ($opponent == MOVE_1 && $self == MOVE_2) {
        // win
        $score += SCORE_WIN;
    } elseif ($opponent == MOVE_2 && $self == MOVE_3) {
        // win
        $score += SCORE_WIN;
    } elseif ($opponent == MOVE_3 && $self == MOVE_1) {
        // win
        $score += SCORE_WIN;
    } else  {
        // lose
        $score += SCORE_LOST;
    }
    
    $score += $move_self_score;

    return $score;
}