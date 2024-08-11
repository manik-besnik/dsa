<?php

namespace ThreeSum;
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum(array $nums): array
    {
        $result = [];

        $length = count($nums);

        if ($length < 3) {
            return $result;

        }

        sort($nums);

        for ($i = 0; $i < $length - 2; $i++) {

            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = $length - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum === 0) {
                    $key = json_encode([$nums[$i], $nums[$left], $nums[$right]]);
                    $result[$key] = [$nums[$i], $nums[$left], $nums[$right]];

                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $result;
    }
}

$s = new Solution();

print_r($s->threeSum([-2,0,0,2,2]));