<?php

namespace ReverseLinkedList;




class ListNode
{

    function __construct(public mixed $val = 0, public ListNode|null $next = null)
    {
    }
}

class LinkedList extends ListNode
{
    public ListNode|null $head = null;
    public ListNode|null $tail = null;

    public function append(mixed $val): void
    {
        $newNode = new ListNode($val);

        if ($this->head) {

            $currentNode = $this->getLastNode();
            $currentNode->next = $newNode;

        } else {
            $this->head = $newNode;
        }

        $this->tail = $newNode;

    }

    public function getLastNode(): ListNode|null
    {
        $currentNode = $this->head;
        while ($currentNode->next) {
            $currentNode = $currentNode->next;
        }

        return $currentNode;
    }
}


class Solution
{
    /**
     * @param ListNode|null $head
     * @return ListNode|null
     */
    public function reverseList(ListNode|null $head):ListNode|null
    {

        if (!$head){
            return $head;
        }

        $prev = null;
        $current = $head;

        while ($current){
            $next = $current->next;
            $current->next = $prev;
            $prev= $current;
            $current = $next;
        }

        return $prev;

    }
}