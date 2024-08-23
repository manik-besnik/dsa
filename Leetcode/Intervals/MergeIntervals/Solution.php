<?php


namespace MergeIntervals;
class Solution
{
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge(array $intervals): array
    {

        if (empty($intervals)) {
            return [];
        }

        $length = count($intervals);

        if ($length === 1) {
            return $intervals;
        }

        usort($intervals, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        $i = 0;

        while ($i < $length - 1) {
            if ($intervals[$i][1] >= $intervals[$i + 1][0]) {
                $intervals[$i][1] = max($intervals[$i][1], $intervals[$i + 1][1]);

                array_splice($intervals, $i + 1, 1);

                $length--;
            } else {
                $i++;
            }
        }

        return $intervals;

    }
}

$s = new Solution();

print_r($s->merge([[1, 3], [2, 6], [8, 10], [15, 18]]));