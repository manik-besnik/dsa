<?php

namespace WordPatten;

class Solution
{
    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    public function wordPattern(string $pattern, string $s): bool
    {

        $wordArr = explode(' ', $s);

        if (count($wordArr) !== strlen($pattern)) {
            return false;
        }

        $patternToWordMap = [];
        $wordToPatternMap = [];

        foreach ($wordArr as $key => $word) {
            $patternChar = $pattern[$key];

            if (isset($patternToWordMap[$patternChar])) {
                if ($patternToWordMap[$patternChar] !== $word) {
                    return false;
                }
            } else {

                if (isset($wordToPatternMap[$word])) {
                    return false;
                }

                $patternToWordMap[$patternChar] = $word;
                $wordToPatternMap[$word] = $patternChar;
            }
        }

        return true;

    }
}

$s = new Solution();

var_dump($s->wordPattern('abba', 'dog cat cat dog'));