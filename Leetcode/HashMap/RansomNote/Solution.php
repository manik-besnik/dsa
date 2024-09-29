<?php

namespace RansomNote;

class Solution
{
    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    public function canConstruct(string $ransomNote, string $magazine): bool
    {

        $map = [];

        for ($i = 0; $i < strlen($magazine); $i++) {

            if (isset($map[$magazine[$i]])) {
                $map[$magazine[$i]]++;
            } else {
                $map[$magazine[$i]] = 1;
            }
        }


        for ($i = 0; $i < strlen($ransomNote); $i++) {
            if (isset($map[$ransomNote[$i]]) && $map[$ransomNote[$i]] > 0) {
                $map[$ransomNote[$i]]--;
            } else {
                return false;
            }
        }

        return true;

    }
}

$s = new Solution();

var_dump($s->canConstruct('aa', 'aab'));