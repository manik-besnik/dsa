<?php

namespace FindIndexOfFirstOccurrenceString;

class Solution
{
    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr(string $haystack, string $needle): int
    {

        $needleLength = strlen($needle);
        for ($i = 0; $i <= strlen($haystack) - $needleLength; $i++) {
            $substr = substr($haystack, $i, $needleLength);
            if ($substr === $needle) {
                return $i;
            }
        }

        return -1;
    }
}

$s = new Solution();

//print_r($s->strStr("sadbutsad", "sad"));
print_r($s->strStr("mississippi", "issip"));