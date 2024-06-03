<?php

	function twoSum($nums, $target) {

        $map = [];

        for($i=0; $i < count($nums); $i++){
            $completion =  $target - $nums[$i];

            if(isset($map[$completion])){
                return [$map[$completion],$i];
            }

            $map[$nums[$i]] = $i;
        }
    }
	function maxSubArray($nums) {
        $sum = 0;
        $maxSum = $nums[0];

        for($i=0; $i < count($nums); $i++){
            $sum += $nums[$i];
            if($maxSum < $sum){
                $maxSum = $sum;
            }
            if($sum < 0){
                $sum = 0;
            }
        }

        return $maxSum;
    }