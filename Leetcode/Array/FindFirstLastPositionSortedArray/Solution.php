<?php

namespace FindFirstLastPositionSortedArray;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function searchRange(array $nums, int $target): array
    {

        if (count($nums) === 0) {

            return [-1, -1];
        }

        $result = [];

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] === $target) {
                if (isset($result[0])) {
                    $result[1] = $i;
                } else {
                    $result[0] = $i;
                }
            }
        }



        if (isset($result[0])  && !isset($result[1])) {
            return [$result[0],$result[0]];
        }

        if (isset($result[1])) {
            return $result;
        }

        return [-1, -1];
    }
}

$solution = new Solution();
$nums = [5,7,7,8,8,10];
$target = 6;
print_r($solution->searchRange($nums, $target));
