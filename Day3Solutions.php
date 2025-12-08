<?php function adventDay3()
{
    $inputs = file_get_contents();
    $inputs = explode('PHP_EOL', $inputs);
    $results = array_map(function ($battery) {
        $values = array_map("intval", str_split($battery));
        while (count($values) > 12) {
            $break = false;
            $count = count($values);
            for ($i = 0; $i < $count - 1; $i++) {
                if ($values[$i] < $values[$i + 1]) {
                    $break = true;
                    array_splice($values, $i, 1);
                    break;
                }
            }
            if (!$break) {
                array_pop($values);
            }
        }
        return intval(implode("", $values));
    }, $inputs);
    $sum = 0;
    foreach ($results as $result) {
        $sum += $result;
    }
    print_r($sum);

}