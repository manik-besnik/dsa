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
    public function deleteDuplicates(ListNode|null $head): ListNode|null
    {
        if (!$head && !$head->next) {
            return $head;
        }

        $duplicate = new ListNode();
        $duplicate->next = $head;
        $result = $current = $duplicate;
        $current = $current->next;

        while ($current->next){
            if ($current->val === $current->next->val){
                while ($current->val === $current->next->val){
                    $current = $current->next;
                }

                $duplicate ->next = $current->next;
                $current = $current->next;
            }else{
                $current = $current->next;
                $duplicate = $duplicate->next;
            }
        }

        return $result->next;
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
$l1->append(3);
$l1->append(3);
$l1->append(3);
$l1->append(4);
$l1->append(5);


$solution = new Solution();

print_r($solution->deleteDuplicates($l1->head));