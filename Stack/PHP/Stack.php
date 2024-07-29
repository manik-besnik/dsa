<?php


class Node
{
    public function __construct(public int $value, public Node|null $next = null)
    {
    }
}

class Stack
{
    public int $count = 0;

    public Node|null $head = null;

    public Node|null $top;

    public function push(int $value): void
    {
        $node = new Node($value);

        if (!$this->head) {
            $this->head = $node;
        } else {
            $currentNode = $this->findLastNode();
            $currentNode->next = $node;
            $this->top = $node;
        }

        $this->count++;

    }

    public function pop(): bool
    {

        if (!$this->head) {
            return false;
        }

        $currentNode = $this->findByPosition($this->count - 1);

        if ($currentNode) {
            $currentNode->next = null;
            $this->top = $currentNode;
            $this->count--;
            return true;
        }

        return false;


    }

    public function isEmpty(): bool
    {
        if ($this->count > 0) {
            return false;
        }
        return true;
    }

    public function top(): Node|null
    {
        return $this->top;
    }

    private function findLastNode(): ?Node
    {
        $currentNode = $this->head;
        while ($currentNode->next) {
            $currentNode = $currentNode->next;
        }

        return $currentNode;
    }

    private function findByPosition(int $position): Node|null
    {
        if ($position === 0) {
            return $this->head;
        }

        $currentNode = $this->head;

        $i = 1;

        while (true) {
            if ($i === $position) {
                return $currentNode;
            }

            $currentNode = $currentNode?->next;

            $i++;
        }

    }
}

$stack = new Stack();

$stack->push(10);
$stack->push(15);
$stack->push(20);
$stack->push(25);
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();

var_dump($stack->isEmpty());
