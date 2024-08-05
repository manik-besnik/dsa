<?php

namespace MergeSortedArray;

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    public function merge(array &$nums1, int $m, array $nums2, int $n)
    {

        $newArr = $nums1;
        $nums1 = [];

        $count = 0;
        $length = $m + $n;
        while ($count < $length) {
            if (isset($newArr[$count]) && isset($nums2[$count])) {

                if ($newArr[$count] > 0) {

                    $nums1[] = min($newArr[$count], $nums2[$count]);
                }

                $count++;

                print_r($nums1);

            } elseif (isset($newArr[$count])) {

                $nums1[] = $newArr[$count];
                $count++;
            } elseif (isset($nums2[$count])) {

                $nums1[] = $nums2[$count];
                $count++;
            }


        }

        return $nums1;
    }
}

$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
$solution = new Solution();

print_r($solution->merge($nums1, 3, $nums2, 3));