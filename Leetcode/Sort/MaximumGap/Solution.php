<?php

namespace MaximumGap;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumGap(array $nums): int
    {

        $gap = 0;
        $length = count($nums);

        if ($length === 1 || $length === 0) {
            return $gap;
        }

        sort($nums);

        $left = 0;
        $right = 1;


        while ($right < $length){
            $gap = max($gap, $nums[$right] - $nums[$left]);
            $left++;
            $right++;
        }

        return $gap;

    }
}