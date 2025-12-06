<?php 
$inputs = file_get_contents();

$ranges = [];
$ingredients = [];
$count = 0;
$database = explode(PHP_EOL, $inputs);
foreach($database as $item){
    if(str_contains($item,'-')){
        $ranges[] = $item;}elseif(is_numeric($item))
        {
            $ingredients[] = $item;
        }
}

foreach($ingredients as $ingredient){
    foreach($ranges as $range){
        $range = explode("-",$range);
        if($ingredient >= $range[0] && $ingredient <= $range[1]){
            $count++;
            continue 2;
        }
    }
}
print_r($count);