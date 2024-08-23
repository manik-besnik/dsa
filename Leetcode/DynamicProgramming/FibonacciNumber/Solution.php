<?php

namespace FibonacciNumber;
class Solution
{
    public array $memory = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    public function fib(int $n): int
    {

        if (isset($this->memory[$n])) {
            return $this->memory[$n];
        }

        if ($n === 0 || $n === 1) {
            return $n;
        }

        $this->memory[$n] = $this->fib($n - 1) + $this->fib($n - 2);

        return $this->memory[$n];


    }
}