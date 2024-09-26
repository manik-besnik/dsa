<?php

namespace RemoveLinkedListElements;


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
     * @param Integer $val
     * @return ListNode|null
     */
    function removeElements(ListNode|null $head, int $val): ?ListNode
    {

        while ($head && $head->val == $val) {
            $head = $head->next;
        }

        $curr = $head;
        while ($curr && $curr->next) {
            if ($curr->next->val == $val) {
                $curr->next = $curr->next->next;
            } else {
                $curr = $curr->next;
            }
        }

        return $head;
    }


}

$ll = new LinkedList();

$ll->append(5);
$ll->append(2);
$ll->append(8);
$ll->append(13);
$ll->append(3);
$ll->append(8);

$s = new Solution();

print_r($s->removeElements($ll->head, 8));