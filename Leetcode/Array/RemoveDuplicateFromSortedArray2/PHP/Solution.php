<?php

class Solution
{

    /**
     * @param array $nums
     * @return int
     */
    public function removeDuplicates(array &$nums): int
    {
        $prevNum = $nums[0];

        $prevCount = 1;

        $i = 1;

        $length = count($nums);

        while ($i < $length) {

            if (isset($nums[$i]) && $nums[$i] === $prevNum) {

                if ($prevCount === 2) {
                    unset($nums[$i]);

                } else {
                    $prevCount++;
                }
            } else {
                $prevNum = $nums[$i];

                $prevCount = 1;

            }

            $i++;
        }


        return count($nums);
    }
}

$solution = new Solution();

//var_dump($solution->removeDuplicates([1,1,1,2,2,3]));
$nums = [0,0,1,1,1,1,2,3,3];
var_dump($solution->removeDuplicates($nums));
var_dump($nums);