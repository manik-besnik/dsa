<?php 

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    public function tribonacci($n)
    {
        if ($n === 0) {
            return 0;
        } elseif ($n === 1 || $n === 2) {
            return 1;
        }

        $t0 = 0;
        $t1 = 1;
        $t2 = 1;

        for ($i = 3; $i <= $n; $i++) {
            $temp = $t2;
            $t2 = $t2 + $t1 + $t0;
            $t0 = $t1;
            $t1 = $temp;
        }

        return $t2;
    }
}

$s = new Solution();
echo $s->tribonacci(25);
