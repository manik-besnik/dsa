<?php

namespace ReverseWordsInAString;

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function reverseWords(string $s): string
    {
        $s = trim($s);

        $arr = [];
        $str = "";
        for ($i = strlen($s) - 1; $i >= 0; $i--) {

            if ($s[$i] !== ' ') {
                $str = $s[$i] . $str;

            } else {
                if (strlen($str) > 0) {
                    $arr[] = $str;
                    $str = "";
                }
            }
        }

        if (strlen($str) > 0) {
            $arr[] = $str;
        }


        return implode(' ', $arr);
    }
}

$solution = new Solution();

echo $solution->reverseWords("a good   example");