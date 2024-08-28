<?php

namespace DivideTwoIntegers;

class Solution
{
    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    public function divide(int $dividend, int $divisor): int
    {

        $result = 0;

        $isNegative = false;

        if ($dividend < 0 || $divisor < 0) {
            $isNegative = true;
        }

        if ($dividend < 0 && $divisor < 0) {

            $isNegative = false;
        }

        $total = abs($divisor);

        if ($total === 1){
            if (pow(2,31) <= $dividend){
                $dividend--;
            }
            return   $isNegative ? -abs($dividend) : abs($dividend);
        }

        while (abs($dividend) >= $total) {
            $total += abs($divisor);
            $result++;
        }

        return $isNegative ? -$result : $result;

    }
}

//
//$devide =  intVal($dividend/$divisor);
//$max_limit = pow(2,31);
//
//if($devide >= $max_limit){
//    return ($max_limit-1);
//}
//return $devide;
$s = new Solution();

print_r($s->divide(9, -3));