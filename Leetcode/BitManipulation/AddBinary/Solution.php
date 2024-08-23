<?php

namespace AddBinary;
class Solution
{
    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary(string $a, string $b): string
    {

        $dec1 = number_format(base_convert($a, 2, 10),0,'','');
        $dec2 = number_format(base_convert($b, 2, 10),0,'','');

        $sumDec =(int) $dec1 +(int) $dec2;
        return base_convert($sumDec, 10, 2);

    }
}