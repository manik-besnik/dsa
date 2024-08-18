<?php

namespace InsertDeleteGetRandom;

class RandomizedSet
{
    public array $sets = [];

    function __construct()
    {
        $this->sets = [];
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert(int $val): bool
    {
        if (!in_array($val, $this->sets)) {
            $this->sets[] = $val;
            return true;
        }
        return false;
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove(int $val): bool
    {
        $k = array_search($val, $this->sets);
        if ($k !== false) {
            unset($this->sets[$k]);
            return true;
        }
        return false;
    }

    /**
     * @return Integer
     */
    function getRandom(): int
    {
        $sets = $this->sets;
        shuffle($sets);
        return $sets[0];
    }
}

$s = new RandomizedSet();

var_dump($s->insert(1));
var_dump($s->remove(2));
var_dump($s->insert(2));
var_dump($s->getRandom());
var_dump($s->remove(1));
var_dump($s->insert(2));
var_dump($s->getRandom());
