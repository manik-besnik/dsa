<?php

namespace JumpGame2;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return int
     */
    function jump(array $nums): int
    {
        $length = count($nums);

        $jump = 0;
        $current = 0;
        $farthest = 0;

        for ($i = 0; $i < $length - 1; $i++) {

            $farthest = max($farthest, $nums[$i] + $i);

            if ($i === $current) {
                $current = $farthest;
                $jump++;
            }

        }

        return $jump;

    }
}

$s = new Solution();

var_dump($s->jump([2, 3, 1, 1, 4]));

var_dump($s->jump([1, 2, 3]));