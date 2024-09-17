<?php

namespace SwapNodesPairs;


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
     * @param ListNode|null $head
     * @return ListNode|null
     */
    function swapPairs(ListNode|null $head): ListNode|null
    {

        if (!$head || !$head->next) {
            return $head;
        }

        $this->swap($head);

        return $head;

    }

    private function swap(ListNode|null $listNode): void
    {
        if (!$listNode || !$listNode->next) {
            return;
        }

        $currentNodeVal = $listNode->val;

        $nextNodeVal = $listNode->next->val;

        $listNode->val = $nextNodeVal;

        $listNode->next->val = $currentNodeVal;


        $this->swap($listNode->next->next);

    }
}

$ll = new LinkList();

$ll->append(1);
$ll->append(2);
$ll->append(3);
$ll->append(4);
$ll->append(5);

$s = new Solution();

print_r($s->swapPairs($ll->head));