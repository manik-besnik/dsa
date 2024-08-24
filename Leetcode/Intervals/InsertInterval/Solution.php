<?php

namespace InsertInterval;

class Solution
{
    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert(array $intervals, array $newInterval): array
    {
        $length = count($intervals);

        if ($length === 0 && empty($newInterval)) {
            return [];
        }

        if ($length === 0 && !empty($newInterval)) {
            return [$newInterval];
        }

        if ($length === 1 && empty($newInterval)) {
            return $intervals;
        }

        $intervals[] = $newInterval;

        usort($intervals, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        return $this->merge($intervals);


    }

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    private function merge(array $intervals): array
    {
        $i = 0;
        while ($i < count($intervals) - 1) {

            if ($intervals[$i][1] >= $intervals[$i + 1][0]) {
                $intervals[$i][1] = max($intervals[$i][1], $intervals[$i + 1][1]);
                array_splice($intervals, $i + 1, 1);
            } else {
                $i++;
            }

        }

        return $intervals;
    }
}

$s = new Solution();

print_r($s->insert([[2, 6], [7, 9]], [15, 18]));