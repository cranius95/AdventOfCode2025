<?php function adventDay2()
    {
        $inputs = file_get_contents();
        $inputs = explode(',', $inputs);
        $countPuzzle1 = 0;
        $countPuzzle2 = 0;
        foreach ($inputs as $input) {
            $range = explode('-', $input);
            for ($i = $range[0]; $i <= $range[1]; $i++) {
                if (strlen($i) % 2 == 1) {
                    continue;
                }
                $divisor = pow(10, strlen($i) / 2);
                if (abs($i % $divisor) == (int)abs($i / $divisor)) {
                    $countPuzzle1 += $i;
                }
            }
            for ($i = $range[0]; $i <= $range[1]; $i++) {
                if (strlen($i) < 2) {
                    continue;
                }
                $divisors = self::arrayOfDivisors(strlen($i));
                $valid = false;
                foreach ($divisors as $divisor) {
                    if (($divisor % 2 == 0 && $divisor >= 2 && $divisor == strlen($i))) {
                        continue;
                    }
                    $string_split = str_split($i, $divisor);
                    if (substr_count($i, $string_split[0]) == (strlen($i) / $divisor)) {
                        $valid = true;
                    }
                }
                if (!$valid) {
                    continue;
                }
                print_r($i . '<br>');
                $countPuzzle2 += $i;
            }
        }
        print_r($countPuzzle1 . '<br>');
        print_r($countPuzzle2 . '<br>');
    }

    function arrayOfDivisors($x)
    {
        $divisors = [];
        for ($i = 1; $i < $x; $i++) {
            if ($x % $i == 0) {
                $divisors [] = $i;
            }
        }
        return $divisors;
    }