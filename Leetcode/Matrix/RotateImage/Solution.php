<?php

namespace RotateImage;

class Solution
{
    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(array &$matrix): null
    {
        $newMatrix = $matrix;
        $matrix = [];
        $length = count($newMatrix);

        $i = $length - 1;
        $j = 0;

        while ($i >= 0) {

            if ($j === $length) {
                $j = 0;
                $i--;
                continue;
            }

            $matrix[$j][] = $newMatrix[$i][$j];

            $j++;
        }


        return null;
    }
}

$s = new Solution();
$matrix = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
$s->rotate($matrix);
var_dump($matrix);