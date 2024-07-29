<?php

class TopKElements
{
    public function __construct(public array $arr)
    {
    }

    public function getSumOfPElements($p): void
    {
        $sum = 0;
        $i = 0;

        while ($i < $p){
            $sum += $this->arr[$i];
            $i++;
        }

        $i = $p;

        $maxSum = $sum;

        while ($i < count($this->arr)){
            $sum += $this->arr[$i] - $this->arr[$i - $p];

            if ($sum > $maxSum){
                $maxSum = $sum;
            }

            $i ++;
        }

        echo $maxSum;

    }
}
$arr = [6,89,909,9,-100,85,800];
$maxSum = new TopKElements($arr);

$maxSum->getSumOfPElements(4);

