<?php

namespace ContainsDuplicate;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate(array $nums): bool
    {
        if (empty($nums)){
            return false;
        }
        $length = count($nums);
        if ($length === 1){

            return false;
        }

        $map = [];
        for ($i = 0; $i < $length; $i++) {
            if (isset($map[$nums[$i]])) {
                return true;
            } else {
                $map[$nums[$i]] = $nums[$i];
            }
        }
        return false;

    }
}