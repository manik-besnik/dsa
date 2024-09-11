<?php

namespace PopulatingNextRightPointersEachNode;


class Node
{
    public mixed $val = null;
    public Node|null $left = null;
    public Node|null $right = null;
    public Node|string|null $next = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }

}

class BinarySearchTree
{
    public Node|null $root = null;

    public function insert(mixed $val): void
    {
        $treeNode = new Node($val);

        if (!$this->root) {
            $this->root = $treeNode;

            return;
        }

        $currentNode = $this->root;

        while (true) {
            if ($currentNode->val > $val) {

                if ($currentNode->left) {
                    $currentNode = $currentNode->left;
                } else {
                    $currentNode->left = $treeNode;
                    return;
                }

            }
            if ($currentNode->val < $val) {
                if ($currentNode->right) {
                    $currentNode = $currentNode->right;
                } else {
                    $currentNode->right = $treeNode;
                    return;
                }
            }
        }
    }
}

class Solution
{
    /**
     * @param Node|null $root
     * @return Node|null
     */
    public function connect(Node|null $root): Node|null
    {
        if (!$root) {
            return $root;
        }

        $queue = [$root];

        while (!empty($queue)) {
            $len = count($queue);


            for ($i = 0; $i < $len; $i++) {
                $currentNode = array_shift($queue);

                if ($i < $len - 1) {
                    $currentNode->next = $queue[0];
                }

                if ($currentNode->left) {
                    $queue[] = $currentNode->left;
                }
                if ($currentNode->right) {
                    $queue[] = $currentNode->right;
                }

            }

        }


        return $root;

    }
}

$tree = new BinarySearchTree();

$tree->insert(8);
$tree->insert(15);
$tree->insert(7);
$tree->insert(20);
$tree->insert(2);


$s = new Solution();

print_r($s->connect($tree->root));