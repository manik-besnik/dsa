<?php

namespace HIndex;

class Solution
{
    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex(array $citations): int
    {
        rsort($citations);

        $i = 0;
        while(isset($citations[$i]) && $i < $citations[$i]){

            $i++;
        }
        return $i;

    }
}

$s = new Solution();

print_r($s->hIndex([3,0,6,1,5]));