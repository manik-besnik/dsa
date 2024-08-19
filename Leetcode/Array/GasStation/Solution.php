<?php

namespace GasStation;

class Solution
{
    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit(array $gas, array $cost): int
    {
        if (array_sum($gas) < array_sum($cost)) {
            return -1;
        }

        $total = 0;
        $result = 0;

        for ($i = 0; $i < count($gas); $i++){
            $total += $gas[$i] - $cost[$i];

            if ($total < 0){

                $total = 0;

                $result = $i+1;
            }
        }

        return $result;
    }
}