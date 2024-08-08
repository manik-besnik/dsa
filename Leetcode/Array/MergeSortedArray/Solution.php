<?php

namespace MergeSortedArray;

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return null
     */
    public function merge(array &$nums1, int $m, array $nums2, int $n): null
    {

        $newNums = $nums1;
        $nums1 = [];

        $count = 0;
        $totalLength = $m + $n;
        $pointer1 = 0;
        $pointer2 = 0;


        while ($count < $totalLength) {
            if ($pointer1 < $m && $pointer2 < $n) {
                if ($newNums[$pointer1] > $nums2[$pointer2]) {
                    $nums1[] = $nums2[$pointer2];
                    $pointer2++;

                } else {
                    $nums1[] = $newNums[$pointer1];
                    $pointer1++;
                }
            } elseif ($pointer1 < $m) {
                $nums1[] = $newNums[$pointer1];
                $pointer1++;
            } elseif ($pointer2 < $n) {
                $nums1[] = $nums2[$pointer2];
                $pointer2++;
            }

            $count++;


        }

        return null;
    }
}

$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
$solution = new Solution();

$solution->merge($nums1, 3, $nums2, 3);

print_r($nums1);