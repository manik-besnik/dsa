<?php

namespace RemoveDuplicatesFromSortedList2;


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
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates(ListNode $head): ListNode
    {
        $currentNode = $head;
        $prevNodeValue = $head->val;


        while ($currentNode) {

            if ($currentNode->next && $currentNode->next->val === $prevNodeValue) {
                $nextNode = $currentNode->next->next;
                $currentNode->next = $nextNode;
            } else {
                $currentNode = $currentNode->next;
            }

            $prevNodeValue = $currentNode->val;

        }

        return $head;
    }
}


$l1 = new LinkList();
$l1->append(1);
$l1->append(2);
$l1->append(2);
$l1->append(2);
$l1->append(3);
$l1->append(3);
$l1->append(4);


$solution = new Solution();

print_r($solution->deleteDuplicates($l1->head));