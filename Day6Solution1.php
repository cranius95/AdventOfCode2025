<?php
// $inputs = file_get_contents();
$inputs = '123 328  51 64 
 45 64  387 23 
  6 98  215 314
*   +   *   + ';

$count = 0;
$inputs = explode(PHP_EOL, $inputs);
$inputs = array_map(function ($val) {
	$val = trim(preg_replace('/ +/', ' ', $val));
	return explode(' ', $val);
}, $inputs);
$flipped = [];
$length = count($inputs);
$width = count($inputs[0]);
for ($i = 0; $i <= $length - 1; $i++) {
	for ($j = 0; $j <= $width - 1; $j++) {
		$flipped[$j][$i] = $inputs[$i][$j];
	}
}

foreach ($flipped as $input) {

	switch ($input[$length - 1]) {
		case "+":
			$partial = 0;
			for ($i = 0; $i <= $length - 2; $i++) {
				$partial = $partial + (int) $input[$i];

			}
			break;
		case "*":
			$partial = 1;
			for ($i = 0; $i <= $length - 2; $i++) {
				$partial = $partial * $input[$i];

			}
			break;
	}
	$count += $partial;
}
print_r($count);