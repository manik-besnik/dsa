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
        $minProfit = PHP_INT_MAX;

        $length = count($prices);

        for ($i = 0; $i < $length; $i++) {
            if ($prices[$i] < $minProfit) {
                $minProfit = $prices[$i];
            } elseif ($prices[$i] - $minProfit > $maxProfit) {
                $maxProfit = $prices[$i] - $minProfit;
            }
        }

        return $maxProfit;
    }
}

$s = new Solution();

print_r($s->maxProfit([2, 1, 2, 1, 0, 1, 2]));