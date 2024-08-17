<?php

namespace PartitionList;


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
     * @param Integer $x
     * @return ListNode|null
     */
    function partition(ListNode|null $head, int $x): ListNode|null
    {

        if (!$head) {
            return null;
        }
        if (!$head->next) {
            return $head;
        }


        $currentNode = $head;
        $bigArr = [];
        $smallArr = [];

        while ($currentNode) {

            if ($currentNode->val >= $x) {
                $bigArr[] = $currentNode->val;

            } else {
                $smallArr[] = $currentNode->val;

            }

            $currentNode = $currentNode->next;

        }

        if (!empty($smallArr)) {
            $head = new ListNode($smallArr[0]);

            $currentNode = $head;
            for ($i = 1; $i < count($smallArr); $i++) {
                $node = new ListNode($smallArr[$i]);
                $currentNode->next = $node;
                $currentNode = $currentNode->next;
            }
            if (!empty($bigArr)) {
                for ($j = 0; $j < count($bigArr); $j++) {
                    $node = new ListNode($bigArr[$j]);
                    $currentNode->next = $node;
                    $currentNode = $currentNode->next;
                }
            }

        } else {
            $head = new ListNode($bigArr[0]);
            $currentNode = $head;
            if (!empty($bigArr)) {
                for ($j = 1; $j < count($bigArr); $j++) {
                    $node = new ListNode($bigArr[$j]);
                    $currentNode->next = $node;
                    $currentNode = $currentNode->next;
                }
            }
        }


        return $head;

    }
}

$ll = new LinkList();
//$ll->append(4);
//$ll->append(3);
//$ll->append(2);
//$ll->append(5);
//$ll->append(2);
$ll->append(2);
$ll->append(2);

$s = new Solution();

print_r($s->partition($ll->head, 1));