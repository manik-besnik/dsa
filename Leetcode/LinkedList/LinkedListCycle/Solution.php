<?php

namespace LinkedListCycle;

class ListNode
{
    public function __construct(public int $val, public ListNode|null $next = null)
    {
    }
}

class LinkedList
{
    public ListNode|null $head = null;
    public ListNode|null $tail = null;

    public function append(int $val): void
    {
        $newNode = new ListNode($val);

        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
            $newNode->next = $this->head;
        } else {
            $tail = $this->tail;
            $tail->next = $newNode;
            $this->tail = $newNode;
            $this->tail->next = $this->head;
        }

    }
}

$ll = new LinkedList();
$ll->append(20);
$ll->append(30);
$ll->append(40);
$ll->append(50);
$ll->append(60);

print_r($ll->head);

class Solution
{
    /**
     * @param ListNode|null $head
     * @return Boolean
     */

    function hasCycle(ListNode|null $head): bool
    {

        if (!$head) {
            return false;
        }
        if (!$head->next) {
            return false;
        }

        $slowPointer = $head;
        $firstPointer = $head->next;

        while ($firstPointer && $firstPointer->next) {

            if ($slowPointer === $firstPointer || $firstPointer === $head) {
                return true;
            }
            $slowPointer = $slowPointer->next;
            $firstPointer = $firstPointer->next->next;
        }

        return false;

    }
}