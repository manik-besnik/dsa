<?php


class Node
{
    public function __construct(public int $value, public Node|null $next = null)
    {
    }
}

class Queue
{
    public int $count = 0;

    public Node|null $head = null;


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

$queue = new Queue();

$queue->enqueue(10);
$queue->enqueue(15);
$queue->enqueue(20);
$queue->enqueue(25);
$queue->dequeue();
//$queue->dequeue();
$queue->dequeue();

print_r($queue->head);
