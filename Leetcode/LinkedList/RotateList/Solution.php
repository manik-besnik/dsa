<?php

namespace RotateList;

/**
 *Definition for a singly-linked list.
 */


class ListNode
{

    function __construct(public mixed $val = 0, public ListNode|null $next = null)
    {
    }
}

class LinkList
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
     * @param Integer $k
     * @return ListNode|null
     */
    function rotateRight(ListNode|null $head, int $k): ListNode|null
    {
        if (!$head) {
            return $head;
        }

        $nodes = [];
        $currentNode = $head;
        $length = 0;

        while ($currentNode) {
            $nodes[] = $currentNode->val;
            $currentNode = $currentNode->next;
            $length++;
        }

        if ($k > $length) {
            $k = $k % $length;
        }

        $rotatedPart = array_slice($nodes, -$k);
        $remainingPart = array_slice($nodes, 0, $length - $k);
        $nodes = array_merge($rotatedPart, $remainingPart);


        $currentNode = new ListNode($nodes[0]);

        $head = $currentNode;

        for ($i = 1; $i < $length; $i++) {
            $newNode = new ListNode($nodes[$i]);
            $currentNode->next = $newNode;

            $currentNode = $currentNode->next;
        }

        return $head;


    }

    private function getLength(ListNode $head): int
    {
        $currentNode = $head;
        $length = 1;
        while ($currentNode->next) {
            $currentNode = $currentNode->next;

            $length++;
        }

        return $length;
    }
}


$ll = new LinkList();

$ll->append(10);
$ll->append(20);
$ll->append(30);
$ll->append(40);
$ll->append(50);

$solution = new Solution();
print_r($solution->rotateRight($ll->head, 9));