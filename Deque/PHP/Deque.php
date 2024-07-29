<?php


class Node
{
    public function __construct(public int $value, public Node|null $next = null)
    {
    }
}

class Deque
{
    public int $count = 0;

    public Node|null $head = null;

    public function push(int $value): void
    {
        $node = new Node($value);

        if (!$this->head) {
            $this->head = $node;
        } else {
            $currentNode = $this->findLastNode();
            $currentNode->next = $node;
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
            $this->count--;
            return true;
        }

        return false;


    }

    public function enqueue(int $value): void
    {
        $node = new Node($value);

        $preNodes = $this->head;

        $this->head = $node;

        $this->head->next = $preNodes;

        $this->count++;

    }

    public function dequeue(): bool
    {

        if (!$this->head) {
            return false;
        }

        $currentNode = $this->findByPosition($this->count - 1);

        if ($currentNode) {
            $currentNode->next = null;
            $this->count--;
            return true;
        }

        return false;


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

$stack = new Deque();

$stack->enqueue(10);
$stack->enqueue(15);
$stack->enqueue(20);
$stack->enqueue(25);
$stack->dequeue();
$stack->dequeue();
$stack->dequeue();
$stack->dequeue();

