<?php
$inputs = file_get_contents();
$warehouse = array_map("str_split", $inputs);
function checkNeighbor($warehouse, $axisX, $axisY)
{
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
    $checkCount = 0;

    foreach ($checks as $check) {
        if (($warehouse[$axisY + $check[0]][$axisX + $check[1]] ?? null) === "@") {
            $checkCount++;
        }
    }
    if ($checkCount < 4) {
        return [$axisY, $axisX];
    } else {
        return null;
    }

}

$coordinates = array();
while (true) {
    $oldCoorinatesCount = count($coordinates);
    foreach ($warehouse as $axisY => $row) {
        foreach ($row as $axisX => $unused) {
            $roll = checkNeighbor($warehouse, $axisX, $axisY);
            if (is_array($roll)) {
                $coordinates[] = $roll;
            }
        }
    }
    foreach ($coordinates as $coordinate) {
        $warehouse[$coordinate[0]][$coordinate[1]] = ".";
    }
    if ($oldCoorinatesCount > 0 && count($coordinates) == $oldCoorinatesCount) {
        print_r(count($coordinates));
        break;
    }
    $oldCoorinatesCount = count($coordinates);
}