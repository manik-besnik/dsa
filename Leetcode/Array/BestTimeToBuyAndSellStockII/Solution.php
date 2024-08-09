<?php

namespace BestTimeToBuyAndSellStockII;

class Solution
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit(array $prices): int
    {

        $maxProfit = 0;

        $left = 0;
        $right = 1;
        $length = count($prices);

        while ($right < $length) {
            if ($prices[$left] < $prices[$right]) {
                $maxProfit += $prices[$right] - $prices[$left];
            }

            $left++;
            $right++;
        }

        return $maxProfit;

    }
}

$s = new Solution();

print_r($s->maxProfit([7,6,4,3,1]));