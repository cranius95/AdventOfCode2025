<?php
$inputs = file_get_contents();
$count = 0;
$minimum = 0;
$max = 0;
$database = explode(PHP_EOL, $input);
foreach ($database as $item) {
    if (str_contains($item, '-')) {
        $ranges[] = $item;
    }
}
$ranges = array_map(function ($item) {
    return array_map("intval", explode("-", $item));
}, $ranges);
sort($ranges);
$results = [];
foreach ($ranges as $id => $range) {
    if ($range[0] > $minimum) {
        $count += ($range[1] - $range[0]) + 1;
    } elseif ($range[1] > $minimum) {
        $count += ($range[1] - $minimum);
    }
    $minimum = max($minimum, $range[1]);
}
print_r($count);