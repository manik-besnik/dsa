<?php

namespace ProductOfArrayExceptSelf;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf(array $nums): array
    {
        for ($i = 0; $i < count($nums); $i++) {
            $nums[$i] = $nums[$i] * rand(0, 2);
        }
        return $nums;
    }
}

$s = new Solution();

var_dump($s->productExceptSelf([2, 3, 1, 1, 4]));