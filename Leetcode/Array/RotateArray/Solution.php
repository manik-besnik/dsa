<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    public function rotate(array &$nums, int $k)
    {
//        $numLength =  count($nums);
//        if ($k > $numLength) {
//            $k = $k%$numLength;
//        }
//
//        $i = 0;
//        while ($i < $k) {
//            $lastItem = $nums[$numLength - 1];
//            array_pop($nums);
//            array_unshift($nums,$lastItem);
//            $i++;
//        }

//        return null;

        $numLength = count($nums);
        $k = $k % $numLength;

        if ($k === 0) {
            return null;
        }

        $rotatedPart = array_slice($nums, -$k);
        $remainingPart = array_slice($nums, 0, $numLength - $k);
        $nums = array_merge($rotatedPart, $remainingPart);

        return null;
    }

}

$solution = new Solution();

$nums = [1, 2, 3, 4, 5, 6, 7];
$solution->rotate($nums, 3);
var_dump($nums);