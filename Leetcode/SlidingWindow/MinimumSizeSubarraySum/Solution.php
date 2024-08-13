<?php

namespace MinimumSizeSubarraySum;
class Solution
{

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen(int $target, array $nums): int
    {
        $result = PHP_INT_MAX;
        $sum = 0;
        $left = 0;
        $right = 0;

        $length = count($nums);

        while ($right < $length || $sum >= $target) {

            if ($sum >= $target) {
                $result = min($result, $right - $left);
                $sum -= $nums[$left++];
            } else {
                $sum += $nums[$right++];
            }
        }


        return $result < PHP_INT_MAX ? $result : 0;


    }


}

$s = new Solution();

print_r($s->minSubArrayLen(7, [2, 3, 1, 2, 4, 3]));
