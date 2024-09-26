<?php

namespace RemoveNodesFromLinkedList;


class ListNode
{

    function __construct(public mixed $val = 0, public ListNode|null $next = null)
    {
    }
}

class LinkedList extends ListNode
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
     * @return ListNode|array|null
     */
    function removeNodes(ListNode|null $head): ListNode|array|null
    {

        if (!$head) {
            return $head;
        }

        $currentNode = $head;
        $compareVal = $head->val;

        $nums = [$head->val];


        while ($currentNode->next) {

            if ($currentNode->val >= $compareVal) {
                $len = count($nums);
                $nums[$len - 1] = $currentNode->val;
                $compareVal = $currentNode->next->val;
            }
            $currentNode = $currentNode->next;

        }


        return $nums;

    }
}

$ll = new LinkedList();

$ll->append(5);
$ll->append(2);
$ll->append(13);
$ll->append(3);
$ll->append(8);

$s = new Solution();

print_r($s->removeNodes($ll->head));