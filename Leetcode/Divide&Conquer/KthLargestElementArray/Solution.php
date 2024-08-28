<?php

namespace KthLargestElementArray;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest(array $nums, int $k): int
    {

        sort($nums);

        $length = count($nums);

        return $nums[$length - $k];


    }
}

$s = new Solution();

print_r($s->findKthLargest([3,2,1,5,6,4], 2));