<?php

namespace TopKFrequentElements;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent(array $nums, int $k): array
    {
        $result = [];
        sort($nums);
        for ($i = 0; $i < count($nums); $i++) {

            if (count($result) === $k) {
                return $result;
            }
            $result[$nums[$i]] = $nums[$i];
        }

        return $result;
    }
}