<?php

namespace MoveZeroes;

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(array &$nums)
    {

        $withOutZeros = [];
        $withZeros = [];

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 0) {
                $withZeros[] = 0;
            } else {
                $withOutZeros[] = $nums[$i];
            }
        }

        $nums = array_merge($withOutZeros, $withZeros);

        return null;

    }
}

$s = new Solution();
$nums = [0, 1, 0, 3, 12];
$s->moveZeroes($nums);
print_r($nums);
