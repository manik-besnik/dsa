<?php


class Node
{
    public function __construct(public string $value, public Node|null $next = null)
    {
    }
}


class Stack
{
    public Node|null $head = null;
    public Node|null $tail = null;

    public int $length = 0;

    public function push(string $value): void
    {

        $node = new Node($value);
        $this->tail = $node;
        $this->length++;

        if (!$this->head) {

            $this->head = $node;

            return;
        }

        $currentNode = $this->findNode($this->length);
        $currentNode->next = $node;

    }

    public function pop(): string
    {
        if ($this->length === 1) {
            $this->length = 0;
            $this->tail = $this->head;
            $value = $this->head->value;
            $this->head = null;
            return $value;
        }
        $currentNode = $this->findNode($this->length - 1);

        $removeAbleNode = $currentNode->next;
        $currentNode->next = null;
        $this->tail = $currentNode;

        $this->length--;

        return $removeAbleNode->value;
    }

    private function findNode($position): Node|null
    {

        if ($this->length < $position) {
            return null;
        }

        $currentNode = $this->head;

        $count = 1;

        while ($currentNode->next) {
            if ($count === $position){
                return $currentNode;
            }
            $currentNode = $currentNode->next;
            $count++;
        }

        return $currentNode;
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function isValid(string $s): bool
    {
        if (strlen($s) === 1){
            return false;
        }

        $stack = new Stack();
        $i = 0;

        while ($i < strlen($s)) {


            if ($s[$i] === '(' || $s[$i] === '{' || $s[$i] === '[') {
                $stack->push($s[$i]);

                $i++;

            } else {

                if ($stack->length === 0){
                    return false;
                }

                $parentheses = $stack->pop();


                if (($parentheses === '(' && $s[$i] === ')')
                    || ($parentheses === '{' && $s[$i] === '}') ||
                    ($parentheses === '[' && $s[$i] === ']')) {


                    $i++;
                }else {
                    return false;
                }

            }


        }

        if ($stack->length === 0){
            return true;
        }


        return false;
    }
}

$solution = new Solution();

var_dump($solution->isValid('({[)'));