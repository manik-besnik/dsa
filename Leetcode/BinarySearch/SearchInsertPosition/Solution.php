<?php

namespace SearchInsertPosition;
class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function searchInsert(array $nums, int $target): int
    {

        $length = count($nums);
        $start = 0;
        $end = $length - 1;

        if ($nums[$end] < $target) {
            return $end + 1;
        }

        if ($nums[$start] > $target) {
            return 0;
        }

        $mid = floor(($start + $end) / 2);

        $findIndex = 0;

        while ($start <= $end) {
            if ($nums[$mid] === $target) {

                return $mid;

            } elseif ($nums[$mid] > $target && $nums[$mid - 1] < $target) {

                return $mid;
            } elseif ($nums[$mid] > $target) {

                $end = $mid - 1;
                $mid = floor(($start + $end) / 2);

            } else {

                $findIndex = $mid - 1;

                $start = $mid + 1;
                $mid = floor(($start + $end) / 2);
            }
        }


        return $findIndex;

    }
}

$s = new Solution();

var_dump($s->searchInsert([1, 3, 5, 6], 2));