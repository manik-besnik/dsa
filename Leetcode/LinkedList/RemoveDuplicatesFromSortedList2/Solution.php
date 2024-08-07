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
     * @param ListNode|null $head
     * @return ListNode|null
     */
    function deleteDuplicates(ListNode|null $head): ListNode|null
    {
        if (!$head){
            return  $head;
        }

        $currentNode = $head->next;
        $prevNodeVal = $head->val;
        $currentNodeVal = $head->next?->val;


        while ($currentNode) {

            if ($currentNodeVal === $prevNodeVal &&
                ($currentNode->next && $currentNode->next?->val === $prevNodeVal)) {

                $prevNodeVal = $currentNode->val;
                $currentNodeVal = $currentNode->next?->val;
                $currentNode = $currentNode->next;

            }elseif ($currentNodeVal === $prevNodeVal &&
                ($currentNode->next && $currentNode->next?->val !== $prevNodeVal)){

                $prevNodeVal = $currentNode->val;
                $currentNodeVal = $currentNode->next?->val;
                $currentNode = $currentNode->next?->next;

            }else {

                $currentNode = $currentNode->next;
            }


        }


        return $currentNode;
    }
}


$l1 = new LinkList();
$l1->append(1);
$l1->append(1);
$l1->append(2);
$l1->append(2);
$l1->append(2);
$l1->append(3);
$l1->append(3);
$l1->append(4);
$l1->append(5);


$solution = new Solution();

print_r($solution->deleteDuplicates($l1->head));