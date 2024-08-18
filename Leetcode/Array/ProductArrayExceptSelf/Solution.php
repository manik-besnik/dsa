<?php

namespace ProductArrayExceptSelf;

class Solution
{/**
 * @param Integer[] $nums
 * @return Integer[]
 */
    function productExceptSelf(array $nums): array
    {
        $length = count($nums);
        $prefix = 1;

        $result = [1];

        for ($i = 0; $i < $length - 1; $i++) {
            $result[$i + 1] = $nums[$i] * $prefix;
            $prefix = $nums[$i] * $prefix;
        }
        $prefix = 1;

        for ($i = $length - 1; $i >= 0; $i--) {
            $result[$i] = $result[$i] * $prefix;
            $prefix = $nums[$i] * $prefix;
        }

        return $result;
    }

}

$s = new Solution();

print_r($s->productExceptSelf([1, 2, 3, 4]));