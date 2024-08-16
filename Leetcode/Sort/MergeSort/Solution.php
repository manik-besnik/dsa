<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function sort(array $nums): array
    {
        $length = count($nums);

        if ($length === 1) {
            return $nums;
        }

        $mid = floor($length / 2);

        $leftArr = array_slice($nums, 0, $mid);
        $rightArr = array_slice($nums, $mid);

        return $this->merge($this->sort($leftArr), $this->sort($rightArr));
    }

    /**
     * @param $arr1
     * @param $arr2
     * @return Integer[]
     */
    private function merge($arr1, $arr2): array
    {
        $sortedArr = [];
        $i = 0;
        $j = 0;
        $arrLen1 = count($arr1);
        $arrLen2 = count($arr2);

        while ($i < $arrLen1 && $j < $arrLen2) {
            if ($arr1[$i] <= $arr2[$j]) {
                $sortedArr[] = $arr1[$i];
                $i++;
            } else {
                $sortedArr[] = $arr2[$j];
                $j++;
            }
        }

        while ($i < $arrLen1) {
            $sortedArr[] = $arr1[$i];
            $i++;
        }

        while ($j < $arrLen2) {
            $sortedArr[] = $arr2[$j];
            $j++;
        }

        return $sortedArr;
    }
}