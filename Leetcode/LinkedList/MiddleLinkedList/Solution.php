<?php

namespace MiddleLinkedList;


class ListNode
{

    function __construct(public mixed $val = 0, public ListNode|null $next = null)
    {
    }
}

class LinkList extends ListNode
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
     * @param ListNode |null $head
     * @return ListNode|null
     */
    function middleNode(ListNode|null $head): ?ListNode
    {

        if (!$head) {
            return $head;
        }

        $fast = $head;
        $slow = $head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;

    }
}

$ll = new LinkList(1);

$ll->append(2);
$ll->append(3);
$ll->append(4);
$ll->append(5);
$ll->append(6);

$s = new Solution();
print_r($s->middleNode($ll->head));