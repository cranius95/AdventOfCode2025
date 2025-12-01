<?php
$start = 50;
$count = 0;
$steps = [];
foreach ($steps as $step) {
    $offset = 1;

    $addition = substr($step, $offset);
    if (str_contains($step, "R")) {
        $start = ($start + (int) $addition) % 100;
    } elseif (str_contains($step, "L")) {
        $start = ($start - (int) $addition) % 100;
    }
 
    if ($start == 0)
        $count++;
}
print_r($count);