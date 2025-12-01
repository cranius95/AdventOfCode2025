<?php
$position = 50;
$count = 0;
$steps = [];
$rotations = count(
    array_filter(
      array_map(function ($row) use (&$position, &$count) {
        $row = str_split($row);
        $direction = array_shift($row);
        $value = (int) implode("", $row);
  
        for ($i = 0; $i < abs($value); $i++) {
          $position += $direction === "R" ? 1 : -1;
          if ($position < 0) {
            $position = 99;
          }
          if ($position > 99) {
            $position = 0;
          }
          if ($position === 0) {
            $count++;
          }
        }
      }, $movements)
    )
    );
print_r($count);


