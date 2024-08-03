<?php

class Solution
{


    /**
     * @param String $s
     * @return Integer
     */
    public function longestValidParentheses(string $s)
    {
        $stack = [];

        if (strlen($s) <= 1) {
            return 0;
        }

        if ($s[0] === ")"){
            $s = ltrim($s,$s[0]);
        }


        for ($i = 0; $i < strlen($s); $i++) {

            if ($i % 2 === 0 && $s[$i] === "("){
                $stack[] = $s[$i];
            }elseif ($i % 2 === 1 && $s[$i] === ")"){
                $stack[] = $s[$i];
            }
        }

        return count($stack);
    }
}

$solution = new Solution();

var_dump( $solution->longestValidParentheses(')()())'));

//echo 3 % 2;