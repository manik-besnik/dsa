<?php

class Node
{
    public function __construct(public int $value, public Node|null $next = null)
    {
    }
}

class LinkedList
{
    public int $count = 0;

    public Node $head;
    public Node $tail;

    public function __construct(int $value)
    {
        $this->head = new Node($value);
        $this->tail = new Node($value);
        $this->count++;
    }

    public function insertAtFirst($value): Node
    {
        $newNode = new Node($value);
        $oldNodes = $this->head;
        $this->head = $newNode;
        $this->head->next = $oldNodes;
        $this->count++;

        return $newNode;
    }

    public function insertAtLast($value): Node
    {
        $lastNode = $this->findLastNode();

        $newNode = new Node($value);

        $lastNode->next = $newNode;

        $this->tail = $newNode;

        $this->count++;

        return $newNode;

    }

    public function insertAt(int $value, int $position): Node
    {
        $prevNode = $this->findByPosition($position - 1);

        $newNode = new Node($value);

        $newNode->next = $prevNode->next;

        $prevNode->next = $newNode;

        $this->count++;

        return $newNode;

    }

    public function updateAt($value, $position): ?Node
    {
        $currentNode = $this->findByPosition($position);

        $currentNode->value = $value;

        return $currentNode;
    }


    public function updateAtFirst($value): ?Node
    {
        $this->head->value = $value;

        return $this->head;
    }


    public function updateAtLast($value): ?Node
    {
        $lastNode = $this->findLastNode();;

        $lastNode->value = $value;

        return $lastNode;
    }

    public function deleteAt($position): ?Node
    {
        $prevNode = $this->findByPosition($position - 1);

        $deleteNode = $prevNode->next;

        $prevNode->next = $deleteNode->next;

        $this->count--;

        return $deleteNode;
    }


    public function deleteAtFirst(): ?Node
    {

        $nextNode = $this->head->next;

        $this->head = $nextNode;

        $this->count--;

        return $nextNode;
    }


    public function deleteAtLast(): ?Node
    {
        $lastNode = $this->findByPosition($this->count - 1);

        $this->tail = $lastNode;

        $lastNode->next = null;

        $this->count--;

        return $lastNode;
    }


    public function findByPosition($position): Node|null
    {
        $currentNode = $this->head;
        $i = 1;
        while ($currentNode->next) {
            if ($i === $position) {
                return $currentNode;
            }

            $currentNode = $currentNode->next;

            $i++;
        }

        return null;
    }

    public function findLastNode(): Node
    {
        $currentNode = $this->head;
        while (true) {

            if (!$currentNode->next) {
                return $currentNode;
            }
            $currentNode = $currentNode->next;
        }
    }

    public function search($value): string
    {
        $currentNode = $this->head;

        while ($currentNode) {
            if ($currentNode->value === $value) {
                return "Data Found";
            }

            $currentNode = $currentNode->next;
        }

        return "data not found";
    }
}

$ll = new LinkedList(50);

$ll->insertAtFirst(20);
$ll->insertAtLast(200);
$ll->insertAtLast(300);
$ll->insertAtLast(400);
$ll->insertAt(100, 3);

$ll->updateAt(150, 4);
$ll->updateAtLast(10);
$ll->deleteAtFirst();
$ll->deleteAtLast();
$ll->deleteAt(4);
//print_r($ll->findByPosition(2));
print_r($ll->search(300));
echo "\n";
print_r($ll->head);