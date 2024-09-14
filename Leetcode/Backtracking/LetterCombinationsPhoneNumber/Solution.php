<?php

namespace Backtracking\LetterCombinationsPhoneNumber;

class Solution
{
    private array $phoneMap = [
        '2' => 'abc', '3' => 'def', '4' => 'ghi', '5' => 'jkl',
        '6' => 'mno', '7' => 'pqrs', '8' => 'tuv', '9' => 'wxyz'
    ];

    private array $result = [];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations(string $digits): array
    {
        if (empty($digits)) {
            return [];
        }

        $this->result = [];
        $this->backtrack("", $digits);
        return $this->result;

    }

    private function backtrack($combination, $nextDigits): void
    {
        if (empty($nextDigits)) {

            $this->result[] = $combination;
        } else {

            $letters = $this->phoneMap[$nextDigits[0]];

            for ($i = 0; $i < strlen($letters); $i++) {
                $this->backtrack($combination . $letters[$i], substr($nextDigits, 1));
            }
        }
    }
}