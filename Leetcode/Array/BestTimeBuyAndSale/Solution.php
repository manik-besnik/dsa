<?php

namespace BestTimeBuyAndSale;

class Solution
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    public function maxProfit(array $prices): int
    {
        $maxProfit = 0;

        $left = 0;
        $right = 1;
        $length = count($prices);

        while ($right < $length) {
            if ($prices[$left] > $prices[$right]) {
                $left++;
            } else {
                $profit = $prices[$right] - $prices[$left];

                if ($profit > $maxProfit) {
                    $maxProfit = $profit;
                }
            }

            $right++;
        }

        return $maxProfit;
    }
}

$s= new Solution();

print_r($s->maxProfit([2,1,2,1,0,1,2]));