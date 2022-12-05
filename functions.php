<?php

function read_input(string $filename, bool $return_lines) {
    $contents = file_get_contents($filename);
    if ($return_lines) {
        return explode("\n", $contents);
    } else {
        return $contents;
    }
}