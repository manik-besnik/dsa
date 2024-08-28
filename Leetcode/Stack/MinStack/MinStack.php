<?php

namespace MinStack;
class MinStack
{

    public array $stack = [];
    public array $min = [];
    public string|int|null $minVal = null;
    public string|int|null $top = null;
    public int $length = 0;

    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $val
     * @return void
     */
    function push(int $val): void
    {
        $this->stack[] = $val;
        if ($this->length === 0) {
            $this->min[] = $val;
            $this->minVal = $val;
        } else {
            $this->min[] = min($val, $this->minVal);
            $this->minVal = $this->min[count($this->min) - 1];
        }
        $this->top = $val;
        $this->length++;
    }

    /**
     * @return void
     */
    function pop(): void
    {
        if ($this->length > 0) {
            array_pop($this->stack);
            array_pop($this->min);
            $this->length--;

            $this->minVal = $this->length > 0 ? $this->min[$this->length - 1] : null;
            $this->top = $this->length > 0 ? $this->stack[$this->length - 1] : null;
        }
    }
    /**
     * @return int|string|null
     */
    function top(): int|string|null
    {
        return $this->top;
    }

    /**
     * @return int|null
     */
    function getMin(): int|null
    {
        return $this->minVal;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

$obj = new MinStack();
$obj->push(-2);
print_r($obj->stack);
print_r($obj->min);
$obj->push(0);
print_r($obj->stack);
print_r($obj->min);
$obj->push(-3);
print_r($obj->stack);
print_r($obj->min);
echo $obj->getMin()."min \n";
//$obj->pop();
//print_r($obj->top());
//print_r($obj->getMin());