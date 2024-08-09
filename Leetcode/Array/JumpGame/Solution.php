<?php

namespace JumpGame;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump(array $nums): bool
    {

        $length = count($nums);

        if ($length === 1) {
            return true;
        }

        $i = $length - 2;
        $toJump = $length  - 1;

        while ($i >= 0) {



            if ($i + $nums[$i] >= $toJump) {
                $toJump = $i;
            }
            $i--;
        }

        return $toJump === 0;

    }
}

$s = new Solution();

var_dump($s->canJump([1,0,1,0]));