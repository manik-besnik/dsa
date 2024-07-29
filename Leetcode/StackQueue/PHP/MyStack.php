<?php

class Node
{
    public function __construct(public int $value, public Node|null $next = null)
    {
    }
}

class Queue
{
    public Node|null $head = null;
    public int $length = 0;


    public function enqueue($value): void
    {
        $newNode = new Node($value);
        $lastNode = $this->findLastNode();

        if ($lastNode) {

            $lastNode->next = $newNode;
        } else {
            $this->head = $newNode;
        }
        $this->length++;
    }

    public function dequeue(): Node
    {
        $removeAbleNode = $this->head;

        if ($removeAbleNode->next) {
            $notRemoveAbleNodes = $removeAbleNode->next;
            $this->head = $notRemoveAbleNodes;
        } else {
            $this->head = null;
        }

        $this->length--;

        return $removeAbleNode;
    }

    private function findLastNode(): Node|null
    {
        if (!$this->head) {
            return $this->head;
        }
        $currentNode = $this->head;

        while ($currentNode->next) {
            $currentNode = $currentNode->next;
        }

        return $currentNode;
    }
}


class MyStack
{
    public Queue|null $q1;
    public Queue|null $q2;

    public function __construct()
    {
        $this->q1 = new Queue();
        $this->q2 = new Queue();
    }

    public function push(int $value): void
    {
        $this->q1->enqueue($value);

    }

    public function pop(): ?int
    {

        while ($this->q1->length > 1) {
            $node = $this->q1->dequeue();
            $this->q2->enqueue($node->value);
        }

        $removeAbleNode = $this->q1->head;
        $this->q1->length = 0;

        $this->q1->head = null;

        while ($this->q2->length > 0) {

            $node = $this->q2->dequeue();
            $this->q1->enqueue($node->value);
        }

        $removeAbleNode->next = null;

        return $removeAbleNode->value;
    }

    public function top(): int|null
    {
        $currentNode = $this->q1->head;

        if (!$currentNode){
            return null;
        }

        while ($currentNode->next) {
            $currentNode = $currentNode->next;
        }

        return $currentNode->value;
    }

    public function isEmpty(): bool
    {
        if ($this->q1->length > 0) {
            return false;
        }

        return true;
    }

}

$stack = new MyStack();

$stack->push(10);
$stack->push(20);
$stack->push(30);
$stack->pop();
$stack->pop();
$stack->pop();
var_dump($stack->isEmpty());
var_dump($stack->top());