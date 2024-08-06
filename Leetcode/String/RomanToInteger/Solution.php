<?php

namespace RomanToInteger;

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt(string $s): int
    {

        $sum = 0;
        $prevValue = 0;
        $value = [
            'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50,
            'C' => 100, 'D' => 500, 'M' => 1000
        ];

        for ($i = 0; $i < strlen($s); $i++) {
            $currentValue = $value[$s[$i]];
            $sum += ($currentValue > $prevValue) ? ($currentValue - 2 * $prevValue) : $currentValue;
            $prevValue = $currentValue;
        }
        return $sum;

    }
}

$soluion = new Solution();

echo $soluion->romanToInt("MCMXCIV");