<?php
require "../functons.php";

// read input file
$lines = read_input('input.txt', true);

$elfs = [];
$tmp_elf = [];
foreach($lines as $line) {
    if (!empty($line) && is_numeric($line)) {
        $tmp_elf[] = trim($line);
    } else {
        // store elf content and begin new elf
        $elfs[count($elfs)+1] = $tmp_elf;
        $tmp_elf = [];
    }
}

$contents = $tmp_elf = $lines = null;

// collect elf totals
$elf_totals = [];
foreach ($elfs as $key => $elf) {
    $elf_number = $key;
    $calory_count = array_sum($elf);
    $elf_totals[$elf_number] = $calory_count;
}

$elfs = null;

// reverse sort, highest on top
$sorted = arsort($elf_totals);

// Part 1
$first_elf = array_key_first($elf_totals);
echo "the elf with the highest calories is #$first_elf with $elf_totals[$first_elf] calories!\n";

// Part 2
// $top3 = array_slice($elf_totals, 0, 3, true); // if we want to know which elfs
$top3 = array_slice($elf_totals, 0, 3); // if we don't care which elfs
$top3_count = array_sum($top3);

echo "the total of the top3 elfs is $top3_count calories!\n";
