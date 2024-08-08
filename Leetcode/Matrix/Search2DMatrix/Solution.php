<?php

namespace Search2DMatrix;

class Solution
{
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    public function searchMatrix(array $matrix, int $target): bool
    {

        $i = 0;
        $j = 0;
        $length = count($matrix);

        while ($i < $length) {
            if (!isset($matrix[$i][$j])) {
                $i++;
                $j = 0;
            } else {
                if ($matrix[$i][$j] === $target) {
                    return true;
                }
                $j++;
            }
        }

        return false;

    }
}

$s = new Solution();

var_dump($s->searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]],3));