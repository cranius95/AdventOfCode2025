<?php
$inputs = file_get_contents();

$inputs = array_map('str_split', explode(PHP_EOL, $inputs));
$count = 0;
$sum = [];
foreach ($inputs[0] as $key => $value) {
    $sum[$key] = $value == 'S' ? 1 : 0;
}
for ($i = 0; $i <= count($inputs); $i++) {
    for ($j = 0; $j <= count($inputs[0]); $j++) {
        if ($inputs[$i][$j] == '^' && $sum[$j]) {
            $count++;
            $sum[$j - 1] += $sum[$j];
            $sum[$j + 1] += $sum[$j];
            $sum[$j] = 0;
        }
    }
}
print_r("Part1: " . $count . "\n");
print_r("Part2: " . array_sum($sum));