<?php

namespace Heap;

class FindMedianFromDataStream
{
    public array $dataStream = [];


    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum(int $num): null
    {
        $this->dataStream[] = $num;
        sort($this->dataStream);
        return null;
    }

    /**
     * @return float
     */
    function findMedian(): float
    {
        $length = count($this->dataStream);

        $mid = intdiv($length, 2);

        if ($length % 2 === 0){
            return ($this->dataStream[$mid - 1] + $this->dataStream[$mid]) / 2;
        }

        return $this->dataStream[$mid];
    }
}