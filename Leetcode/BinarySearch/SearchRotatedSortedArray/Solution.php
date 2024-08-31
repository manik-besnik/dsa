<?php

namespace SearchRotatedSortedArray;

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
            }
            if ($nums[$start] <= $nums[$mid]) {
                if ($target >= $nums[$start] && $target < $nums[$mid]) {
                    $end = $mid - 1;
                } else {
                    $start = $mid + 1;
                }
            } else {
                if ($target > $nums[$mid] && $target <= $nums[$end]) {
                    $start = $mid + 1;
                } else {
                    $end = $mid - 1;
                }
            }

        }

        return -1;

    }
}

$s = new Solution();

print_r($s->search([5, 6, 1, 2, 3, 4], 5));