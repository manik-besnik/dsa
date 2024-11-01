<?php

class Solution
{

/**
 * @param Integer $n
 * @return Integer
 */
    public function climbStairs($n)
    {
        $one = 1;
        $two = 1;

        for($i = 0; $i < $n -1; $i++){
            $temp = $one;
            $one = $one + $two;
            $two = $temp;
        }

        return $one;
    }
}
