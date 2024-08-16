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
     * @return ListNode|null
     */
    function mergeKLists(array $lists): ListNode|null
    {

        if (empty($lists)) {
            return null;
        }
        if (count($lists) === 1 && !$lists[0]) {
            return null;
        }

        $head = $lists[0];

        $currentNode = $head;

        for ($i = 1; $i < count($lists); $i++) {

            $targetList = $lists[$i];

            if ($targetList && $currentNode) {
                while ($targetList && $currentNode) {
                    if ($currentNode->val >= $targetList->val) {


                        $newCurrentNode = new ListNode($currentNode->val);

                        $newCurrentNode->next = $currentNode->next;

                        $currentNode->val = $targetList->val;

                        $currentNode->next = $newCurrentNode;

                        $targetList = $targetList->next;

                    }
                    if ($currentNode->next) {
                        $currentNode = $currentNode->next;
                    } else {
                        $currentNode->next = $targetList;
                        break;
                    }

                }

            } elseif ($targetList && !$currentNode) {
                $head = $targetList;
                $currentNode = $head;
            }


        }

        return $head;
    }

}

$ll1 = new LinkList();
$ll2 = new LinkList();
$ll3 = new LinkList();

//$ll1->append(1);
//$ll1->append(2);

$ll2->append(-1);
$ll2->append(5);
$ll2->append(11);
$ll3->append(6);
$ll3->append(10);

$solution = new Solution();

print_r($solution->mergeKLists([$ll1->head, $ll2->head,$ll3->head]));