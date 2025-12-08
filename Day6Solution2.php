<?php
$inputs = file_get_contents();
$count = 0;
$operand = null;
$inputs = array_map('str_split',explode(PHP_EOL,$inputs));
$length = count($inputs);
$width = count($inputs[0]);
for($i=0;$i<=$length-1;$i++){
	for($j=0;$j<=$width-1;$j++){
		$flipped[$j][$i] = $inputs[$i][$j];
	}
}
$partialCount = 0;
foreach($flipped as $input){
	if(in_array($input[$length-1],["+","*"])){
		$count += $partialCount;
		$operator = $input[$length-1];
		if($operator == "+")
		$partialCount = 0;
		else
		$partialCount = 1;
	}
	array_pop($input);
	$number = (int)implode($input);
	if($number == 0)
	continue;
	switch($operator){
		case "+":
			$partialCount += (int)$number;
			break;
			case "*":
				$partialCount *= (int)$number;
				break;
	}
}
$count += $partialCount;

print_r($count);