<?php

namespace RemoveNthNodeFromEndOfList;

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
     * @param Integer $n
     * @return ListNode|array
     */
    function removeNthFromEnd(ListNode $head, int $n): ListNode|array
    {
        $length = $this->getLength($head);

        if ($length === 1) {
            return [];
        }

        if ($length === $n) {
            return $head->next;
        }

        $removePosition = $length - $n;

        $currentNode = $this->findNode($head, $removePosition);

        $nextNodes = $currentNode->next->next;

        $currentNode->next = $nextNodes;


        return $head;
    }

    /**
     * @param ListNode $head
     * @param int $position
     * @return ListNode
     */
    private function findNode(ListNode $head, int $position): ListNode
    {
        $currentNode = $head;
        $count = 1;

        while ($currentNode) {
            if ($count === $position) {
                return $currentNode;
            }
            $currentNode = $currentNode->next;
            $count++;
        }

        return $head;
    }

    /**
     * @param ListNode $head
     * @return int
     */
    private function getLength(ListNode $head): int
    {
        $count = 0;
        $currentNode = $head;
        while ($currentNode) {
            $currentNode = $currentNode->next;
            $count++;
        }

        return $count;
    }

}

$ll1 = new LinkList();

$ll1->append(1);
$ll1->append(2);
$ll1->append(3);
$ll1->append(4);
$ll1->append(5);


$solution = new Solution();

print_r($solution->removeNthFromEnd($ll1->head, 2));