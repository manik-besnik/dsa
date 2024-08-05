<?php

namespace AddTwoNumbers;

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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode|null
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2): ?ListNode
    {
        $current1 = $l1;
        $current2 = $l2;
        /** @var ListNode|null $current */
        $current = null;
        $remain = 0;
        $head = $current;


        while ($current1 || $current2) {
            if ($current1 && $current2) {
                $sum = $current1->val + $current2->val + $remain;


                if ($sum > 9) {
                    $sumStr = $sum . '';
                    $remain = (int)$sumStr[0];
                    $newNode = new ListNode($sumStr[1]);
                } else {
                    $newNode = new ListNode($sum);
                    $remain = 0;
                }

                if ($current) {
                    $current->next = $newNode;

                    $current = $current->next;


                } else {
                    $current = $newNode;
                    $head = $current;
                }


                $current1 = $current1->next;
                $current2 = $current2->next;

            } elseif ($current1) {

                $sum = $current1->val + $remain;
                if ($sum > 9) {
                    $sumStr = $sum . '';
                    $remain = (int)$sumStr[0];
                    $newNode = new ListNode($sumStr[1]);
                } else {
                    $newNode = new ListNode($sum);
                    $remain = 0;
                }
                if ($current) {
                    $current->next = $newNode;

                    $current = $current->next;

                } else {
                    $current = $newNode;
                    $head = $current;
                }

                $current1 = $current1->next;

            } elseif ($current2) {
                $sum = $current2->val + $remain;
                if ($sum > 9) {
                    $sumStr = $sum . '';
                    $remain = (int)$sumStr[0];
                    $newNode = new ListNode($sumStr[1]);
                } else {
                    $newNode = new ListNode($sum);
                    $remain = 0;
                }
                if ($current) {
                    $current->next = $newNode;

                    $current = $current->next;

                } else {
                    $current = $newNode;
                    $head = $current;
                }
                $current2 = $current2->next;

            }


        }

        if ($remain > 0) {
            $current->next = new ListNode($remain);
        }

        return $head;
    }
}

$l1 = new LinkList();
$l1->append(9);
$l1->append(9);
$l1->append(9);
$l1->append(9);
$l1->append(9);
$l1->append(9);
$l1->append(9);

$l2 = new LinkList();
$l2->append(9);
$l2->append(9);
$l2->append(9);
$l2->append(9);

$solution = new Solution();

print_r($solution->addTwoNumbers($l1->head, $l2->head));

