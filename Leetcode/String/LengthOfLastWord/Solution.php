<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLastWord(string $s): int
    {
        $s = trim($s);
        $arr = explode(' ', $s);
        return strlen($arr[count($arr) - 1]);

    }
}

$solution= new Solution();
echo $solution->lengthOfLastWord('luffy is still joyboy');