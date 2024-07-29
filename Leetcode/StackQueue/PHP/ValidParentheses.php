<?php

class Node
{
    public function __construct(public string $value, public Node|null $next = null)
    {
    }
}


class NewStack
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
            $this->length = 1;
            $this->tail = $this->head;
            return $this->head->value;
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



class ValidParentheses
{

    public function isValid(string $s): bool
    {

        $stack = new NewStack();
        $i = 0;

        while ($i < strlen($s)) {


            if ($s[$i] === '(' || $s[$i] === '{' || $s[$i] === '[') {
                $stack->push($s[$i]);

            } else {

                $parentheses = $stack->pop();

                if (($parentheses === '(' && $s[$i] === ')')
                    || ($parentheses === '{' && $s[$i] === '}') ||
                    ($parentheses === '[' && $s[$i] === ']')) {
                    return true;
                }

            }

            $i++;


        }

        return false;
    }
}

$obj = new ValidParentheses();

var_dump($obj->isValid('{}{{()}}[]'));