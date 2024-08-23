<?php

namespace RotateFunction;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxRotateFunction(array $nums): int
    {

        $length = count($nums);
        $sum = array_sum($nums);
        $currentRotationValue = 0;

        for ($i = 0; $i < $length; $i++) {
            $currentRotationValue += $i * $nums[$i];
        }

        $maxValue = $currentRotationValue;

        for ($i = 1; $i < $length; $i++) {
            $currentRotationValue += $sum - $length * $nums[$length - $i];
            $maxValue = max($maxValue, $currentRotationValue);
        }

        return $maxValue;

    }



}

$s = new Solution();

print_r($s->maxRotateFunction([4, 3, 2, 6]));