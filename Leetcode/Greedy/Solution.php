<?php

namespace Greedy;

class Solution
{
    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy(array $ratings): int
    {
        $n = count($ratings);
        $candies = array_fill(0, $n, 1);

        for ($i = 1; $i < $n; $i++){
            if ($ratings[$i] > $ratings[$i - 1]){
                $candies[$i] = $candies[$i - 1] + 1;
            }
        }

        for ($j = $n -2; $j >= 0; $j --){
            if ($ratings[$j] > $ratings[$j+1]){
                $candies[$j] = max($candies[$j], $candies[$j+1] + 1);
            }
        }


        return array_sum($candies);

    }
}