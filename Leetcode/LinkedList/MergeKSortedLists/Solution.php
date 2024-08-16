<?php

namespace MergeKSortedLists;

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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists(array $lists)
    {

        $head = $lists[0];

        $currentNode = $head;

        for ($i = 1; $i < count($lists); $i++) {

            $targetList = $lists[$i];

            while ($targetList && $currentNode) {
                if ($currentNode->val >= $targetList->val) {

                    $currentNextNode = $currentNode->next;
                    $node = $targetList;
                    $currentNode->next = $node;
                    $currentNode->next->next = $currentNextNode;
                    $currentNode = $currentNextNode;
                    $targetList = $targetList->next;
                } else {

                    $currentNode = $currentNode->next;


                }
            }

        }

        return $head;
    }

}

$ll1 = new LinkList();
$ll2 = new LinkList();

$ll1->append(1);
$ll1->append(2);
$ll1->append(4);

$ll2->append(1);
$ll2->append(3);
$ll2->append(4);

$solution = new Solution();

print_r($solution->mergeKLists([$ll1->head, $ll2->head]));