<?php

namespace Backtracking\Permutations;

class Permutations
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute(array $nums): array
    {
        $result = [];
        $this->backtrack($nums, [], $result);
        return $result;
    }

    /**
     * Backtracking helper function
     *
     * @param Integer[] $nums
     * @param Integer[] $current
     * @param Integer[][] &$result
     */
    private function backtrack(array $nums, array $current, array &$result): void
    {
        if (count($nums) === 0) {
            $result[] = $current;
            return;
        }

        for ($i = 0; $i < count($nums); $i++) {

            $newNums = $nums;
            $newCurrent = $current;


            $newCurrent[] = $newNums[$i];
            array_splice($newNums, $i, 1);


            $this->backtrack($newNums, $newCurrent, $result);
        }
    }
}

$p = new Permutations();

print_r($p->permute([1, 2, 3]));