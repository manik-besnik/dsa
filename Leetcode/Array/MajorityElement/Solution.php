<?php

namespace MajorityElement;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer|null
     */
    function majorityElement(array $nums): int|null
    {
        $arr = [];

        $length = count($nums);

        for ($i = 0; $i < $length; $i++) {

            if (isset($arr[$nums[$i]])) {
                $arr[$nums[$i]]++;
            } else {
                $arr[$nums[$i]] = 1;
            }

        }


        $result = [0];

        foreach ($arr as $key => $value) {
            if ($value > $result[0]) {
                $result[0] = $value;
                $result[1] = $key;
            }
        }

        return $result[1];

    }
}

$solution = new Solution();

var_dump($solution->majorityElement([2, 2, 1, 1, 1, 2, 2]));