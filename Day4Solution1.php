<?php
$inputs = file_get_contents();
$warehouse = array_map("str_split", explode(PHP_EOL, $inputs));

$count = 0;
$checks = [
    [-1, -1],
    [-1, 0],
    [-1, 1],
    [0, -1],
    [0, 1],
    [1, -1],
    [1, 0],
    [1, 1]
];

foreach ($warehouse as $axisY => $row) {
    foreach ($row as $axisX => $unused) {
        if ($warehouse[$axisX][$axisY] != ".") {
            $checkCount = 0;

            foreach ($checks as $check) {
                [$X, $Y] = $check;
                if (($warehouse[$axisX + $X][$axisY + $Y] ?? null) === "@") {
                    $checkCount++;
                }
            }
            if ($checkCount < 4) {
                $count++;
            } else {

            }

        }
    }
}
print_r($count);