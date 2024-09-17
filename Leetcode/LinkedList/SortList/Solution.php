<?php

namespace SortList;


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
    function sortList(ListNode|null $head): ListNode|null
    {

        if (!$head) {
            return $head;
        }

        return $this->mergeSort($head);

    }

    private function mergeSort(ListNode|null $listNode): ListNode|null
    {
        if ($listNode === null || $listNode->next === null) {
            return $listNode;
        }

        $middle = $this->getMiddle($listNode);

        $nextMiddle = $middle->next;

        $middle->next = null;

        $left = $this->mergeSort($listNode);
        $right = $this->mergeSort($nextMiddle);

        return $this->merge($left, $right);


    }

    private function merge(ListNode|null $left, ListNode|null $right): ListNode|null
    {
        if ($left === null) {
            return $right;
        }

        if ($right === null) {
            return $left;
        }

        if ($left->val <= $right->val) {
            $result = $left;
            $result->next = $this->merge($left->next, $right);
        } else {
            $result = $right;
            $result->next = $this->merge($left, $right->next);
        }

        return $result;
    }

    private function getMiddle(ListNode|null $head): ListNode|null
    {
        if ($head === null){
            return null;
        }

        $fast = $head->next;
        $slow = $head;


        while ($fast !== null && $fast->next !== null){
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }

}