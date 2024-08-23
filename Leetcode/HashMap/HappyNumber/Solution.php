<?php

namespace HappyNumber;

class Solution
{
    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy(int $n): bool
    {

        $seen = [];
        while (true) {
            $str = (string)$n;
            $sum = 0;
            for ($i = 0; $i < strlen($str); $i++) {
                $sum += $str[$i] * $str[$i];
            }
            if (isset($seen[$sum])) {
                return false;
            }
            if ($sum === 1) {
                return true;
            }
            $seen[$sum] = $sum;
            $n = $sum;
        }

    }
}

$s = new Solution();

var_dump($s->isHappy(7));