<?php
$inputs = file_get_contents();
$warehouse = array_map("str_split",explode(PHP_EOL,$inputs));
function checkNeighbor($warehouse, $axisX, $axisY)
{
	if($warehouse[$axisY][$axisX] == '.'){
		return false;
	}
    $checks = [
        [$axisY -1, $axisX-1],
        [$axisY-1, $axisX],
        [$axisY-1, $axisX+1],
        [$axisY, $axisX-1],
        [$axisY, $axisX+1],
        [$axisY+1, $axisX-1],
        [$axisY+1, $axisX],
        [$axisY+1, $axisX+1]
    ];
        $checkCount = 0;

        foreach ($checks as $check) {
        	[$s,$t] = $check;
        if (($warehouse[$s][$t] ?? null) === "@") {
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
while(true){
    $oldCoorinatesCount = count($coordinates);
foreach ($warehouse as $axisY => $row) {
    foreach ($row as $axisX => $unused) {
        $roll = checkNeighbor($warehouse,$axisX, $axisY);
        if(is_array($roll)){
            $coordinates[] = $roll;
        }
    }
}
foreach($coordinates as $coordinate){
	[$x,$y] = $coordinate;
    $warehouse[$x][$y] = ".";
}
if($oldCoorinatesCount > 0 && count($coordinates) == $oldCoorinatesCount) {
print_r(count($coordinates));break;
}
$oldCoorinatesCount = count($coordinates);
}