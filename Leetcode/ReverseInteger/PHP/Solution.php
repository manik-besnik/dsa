<?php

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse(int $x): int
    {


        $result = '';
        $intStr = $x.'';

        $start = strlen($intStr) - 1;

        if ($x < 0){

            $result .= '-';

            for ($i = $start; $i > 0; $i--){

                if ((int)$intStr[$start] === 0 && $i === $start){

                    continue;
                }

                $result .= $intStr[$i];
            }

        }else{


            for ($i = $start; $i >= 0; $i--){

                if ((int)$intStr[$start] === 0 && $i === $start){

                    continue;
                }

                $result .= $intStr[$i];
            }
        }

        if ((int)$result > pow(2,31) - 1 || (int)$result < - pow(2,31) ){
            return 0;
        }

        return (int) $result;
    }
}

$solution = new Solution();

var_dump($solution->reverse(-123));