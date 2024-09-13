<?php

namespace FindPeakElement;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement(array $nums): int
    {

        $length = count($nums);

        $start = 0;
        $end = $length - 1;


        while (true) {

            $mid = floor(($start + $end) / 2);

            if ($nums[$mid] > $nums[$mid - 1] && !isset($nums[$mid + 1])) {
                return $mid;
            } elseif (!isset($nums[$mid - 1]) && $nums[$mid] > $nums[$mid + 1]) {
                return $mid;
            } elseif ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] > $nums[$mid + 1]) {
                return $mid;
            } elseif ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] < $nums[$mid + 1]) {
                $start = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }

    }
}


$s = new Solution();

print_r($s->findPeakElement([1, 2, 3,1,5,2]));