<?php

namespace LongestCommonPrefix;

class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix(array $strs): string
    {
        if(count($strs) === 1){
            return $strs[0];
        }
        $str = '';

        $i = 1;

        $compareStr = $strs[0];

        while ($i < count($strs)) {


            $len = min(strlen($compareStr), strlen($strs[$i]));

            for ($j = 0; $j < $len; $j++) {

                if ($strs[$i][$j] === $compareStr[$j]) {
                    $str .= $compareStr[$j];
                }else{
                    break;
                }

            }

            if($i < count($strs) - 1){
                $compareStr = $str;
                $str = '';
            }

            $i++;

        }

        return $str;

    }
}

$s = new Solution();

print_r($s->longestCommonPrefix(["flower","flow","flight"]));