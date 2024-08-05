<?php

namespace RemoveElement;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(array &$nums, int $val): int
    {


        for ($i = 0; $i < count($nums); $i++) {

            if ($val === $nums[$i]) {
                array_splice($nums,$i,1);
                $i--;
            }
        }
        return count($nums);
    }
}

$solution = new Solution();
$arr = [3, 2, 2, 3];
print_r($solution->removeElement($arr, 3));