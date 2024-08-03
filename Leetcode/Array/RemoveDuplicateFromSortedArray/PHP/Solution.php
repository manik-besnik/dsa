<?php

class Solution
{

    /**
     * @param array $nums
     * @return int
     */
    public function removeDuplicates(array &$nums): int
    {
        $prevNum = '';

        $i = 0;

        $length = count($nums);

        while ($i < $length) {

            if (isset($nums[$i]) && $nums[$i] !== $prevNum) {
                $prevNum = $nums[$i];
            } else {
                unset($nums[$i]);

            }

            $i++;
        }


        return count($nums);
    }
}

$solution = new Solution();

//var_dump($solution->removeDuplicates([1,1,1,2,2,3]));
$nums = [1, 2, 2, 2];
var_dump($solution->removeDuplicates($nums));