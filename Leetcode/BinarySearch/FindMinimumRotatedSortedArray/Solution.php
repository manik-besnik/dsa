<?php

namespace FindMinimumRotatedSortedArray;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin(array $nums): int
    {

        $left = 0;
        $right = count($nums) - 1;

        while($left < $right){
            $mid = ($left + $right) >> 1;

            if($nums[$mid] > $nums[$right]){
                $left = $mid + 1;
            }else{
                $right = $mid;
            }
        }

        return $nums[$left];

    }
}

$s = new Solution();

print_r($s->findMin([2, 3, 4, 1]));