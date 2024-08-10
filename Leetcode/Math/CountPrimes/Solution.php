<?php

namespace CountPrimes;
class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function countPrimes(int $n): int
    {

        if ($n < 0) {
            return 0;
        }
        if ($n === 2) {
            return 1;
        }
        $count = 0;

        $start = 1;

        while ($start <= $n) {
            $count += $this->primeCheck($start);

            $start++;
        }


        return $count;


    }

    private function primeCheck($number): int
    {
        if ($number == 1)
            return 0;
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0)
                return 0;
        }
        return 1;
    }
}