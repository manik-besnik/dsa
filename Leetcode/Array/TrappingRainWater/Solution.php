<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $trappedWater = 0;

        $length = count($height);

        $left = 0;
        $right = $length - 1;
        $leftMax = $height[$left];
        $rightMax = $height[$right];

        while ($left < $right) {
            if ($leftMax < $rightMax) {
                
                $left++;
                $leftMax = max($leftMax, $height[$left]);

                if (($leftMax - $height[$left]) > 0) {
                    $trappedWater += ($leftMax - $height[$left]);
                }

            } else {
                $right--;
                $rightMax = max($rightMax, $height[$right]);

                if (($rightMax - $height[$right]) > 0) {
                    $trappedWater += ($rightMax - $height[$right]);
                }
            }
        }


        return $trappedWater;
    }
}