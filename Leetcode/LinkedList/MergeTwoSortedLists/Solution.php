<?php

namespace MergeTwoSortedLists;

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
     * @param ListNode|null $list1
     * @param ListNode|null $list2
     * @return ListNode |null ListNode
     */
    function mergeTwoLists(ListNode|null $list1, ListNode|null $list2): ?ListNode
    {

        $currentNode1 = $list1;
        $currentNode2 = $list2;

        if (!$list1 && !$list2) {
            /**
             *return this for leetcode []
             */
            return new ListNode();
        }
        if (!$list1) {
            return $list2;
        }
        if (!$list2) {
            return $list1;
        }

        if ($list1->val >= $list2->val) {

            $currentNode = new ListNode($list2->val);
            $currentNode2 = $list2->next;

        } else {

            $currentNode = new ListNode($list1->val);
            $currentNode1 = $list1->next;
        }


        $head = $currentNode;


        while ($currentNode1 || $currentNode2) {
            if ($currentNode1 && $currentNode2) {

                if ($currentNode1->val >= $currentNode2->val) {
                    $newNode = new ListNode($currentNode2->val);
                    $currentNode2 = $currentNode2->next;
                } else {
                    $newNode = new ListNode($currentNode1->val);
                    $currentNode1 = $currentNode1->next;
                }
                $currentNode->next = $newNode;

                $currentNode = $currentNode->next;


            } elseif ($currentNode1) {
                $newNode = new ListNode($currentNode1->val);
                $currentNode->next = $newNode;
                $currentNode1 = $currentNode1->next;
                $currentNode = $currentNode->next;
            } elseif ($currentNode2) {
                $newNode = new ListNode($currentNode2->val);
                $currentNode->next = $newNode;
                $currentNode2 = $currentNode2->next;
                $currentNode = $currentNode->next;
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

print_r($solution->mergeTwoLists($ll1->head, $ll2->head));