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

        $maxSum = $nums[0];
        $sum = 0;
        $length = count($nums);
        $lastPointer = 0;

        for ($i = 0; $i <= $length; $i++) {

            if ($i === $length && $lastPointer === $i) {

                $sum += $nums[0];
            } else {

                $sum += $nums[$i];
            }


            if ($sum > $maxSum) {
                $maxSum = $sum;
                $lastPointer = $i;
            }

            if ($sum < 0) {
                $sum = 0;
            }
        }


        return $maxSum;
    }
}

