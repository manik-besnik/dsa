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

        for ($i = 0; $i < $length - 1; $i++) {

            $toJump = ($length - $i) - 1;

            if ($nums[$i] >= $toJump) {
                $jump++;
            }

        }

        return $jump;

    }
}

$s = new Solution();

var_dump($s->jump([2,3,1,1,4]));