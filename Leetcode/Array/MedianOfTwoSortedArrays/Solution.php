<?php

namespace MedianOfTwoSortedArrays;

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float
    {

        $newArr = array_merge($nums1, $nums2);
        sort($newArr);

        $arrLen = count($newArr);

        $length = floor($arrLen / 2);

        if ($arrLen % 2 === 1){

            return (float)($newArr[$length] + $newArr[$length]) / 2;
        }

        return (float)($newArr[$length - 1] + $newArr[$length]) / 2;

    }
}

$s = new Solution();

print_r($s->findMedianSortedArrays([1,2],[3,4]));