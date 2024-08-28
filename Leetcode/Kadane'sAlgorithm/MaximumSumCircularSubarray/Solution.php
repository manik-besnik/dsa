<?php

namespace MaximumSumCircularSubarray;
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubarraySumCircular(array $nums): int
    {

        $length = count($nums);
        $maxStraightSum = PHP_INT_MIN;
        $minStraightSum = PHP_INT_MAX;
        $tempMaxSum = 0;
        $tempMinSum = 0;
        $arraySum = 0;

        for ($i = 0; $i < $length; $i++) {
            $arraySum += $nums[$i];

            $tempMaxSum += $nums[$i];
            $maxStraightSum = max($maxStraightSum, $tempMaxSum);
            if ($tempMaxSum < 0) {
                $tempMaxSum = 0;
            }

            $tempMinSum += $nums[$i];
            $minStraightSum = min($minStraightSum, $tempMinSum);
            if ($tempMinSum > 0) {
                $tempMinSum = 0;
            }
        }

        if ($arraySum == $minStraightSum) {
            return $maxStraightSum;
        }

        return max($maxStraightSum, $arraySum - $minStraightSum);
    }
}

