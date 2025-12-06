<?php
$inputs = file_get_contents();
$count = 0;
$minimum = 0;
$max = 0;
$database = explode(PHP_EOL, $inputs);
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
foreach ($ranges as $range) {
    if($range[1]<=$minimum){
        continue;
    }
    //    $results[] = [$range[1]-$range[0]];

    $min = ($range[0] >= $minimum) ? $range[0] : $minimum;
    $max = $range[1];

    if($min == $max ){
        $count++;
        continue;
    }
    $count += ($max-$min)+1; 
    $minimum = $max;
}
print_r($count);