<?php

namespace BinarySearch;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function search(array $nums, int $target): int
    {

        $start = 0;
        $end = count($nums) - 1;

        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);

            if ($nums[$mid] === $target) {
                return $mid;
            } elseif ($nums[$mid] > $target) {
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }

        return -1;

    }
}