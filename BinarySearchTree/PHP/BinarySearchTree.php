<?php

namespace BinarySearchTree\PHP;

class Node
{

    public function __construct(
        public int       $value,
        public Node|null $left = null,
        public Node|null $right = null
    )
    {
    }
}

class BinarySearchTree
{
    public Node $root;

    public function __construct(int $value)
    {
        $node = new Node($value);

        $this->root = $node;
    }

    public function insert(int $value): void
    {
        $node = new Node($value);

        $currentNode = $this->root;

        while (true) {
            if ($currentNode->value > $value) {

                if ($currentNode->left) {
                    $currentNode = $currentNode->left;
                } else {
                    $currentNode->left = $node;
                    return;
                }

            }
            if ($currentNode->value < $value) {
                if ($currentNode->right) {
                    $currentNode = $currentNode->right;
                } else {
                    $currentNode->right = $node;
                    return;
                }
            }
        }


    }

    public function search(int $value): string
    {
        $currentNode = $this->root;

        while ($currentNode) {
            if ($currentNode->value === $value) {
                return "Data Found and Data is $value";
            } elseif ($currentNode->value > $value) {
                $currentNode = $currentNode->left;
            } else {
                $currentNode = $currentNode->right;
            }
        }

        return "Data Not Found";
    }

    /**
     * Breath First Search(BFS)
     *
     * Label Order Traverse
     */
    public function traverseWithLoop(): void
    {

        $queue = [$this->root];

        while (count($queue) > 0) {
            $currentQueue = $queue[0];
            echo $currentQueue->value . "\n";

            if ($currentQueue->left) {
                $queue[] = $currentQueue->left;
            }

            if ($currentQueue->right) {
                $queue[] = $currentQueue->right;
            }

            array_shift($queue);

        }

    }

    /**
     * Depth First Search(DFS)
     */

    /**
     * Pre Order Traverse
     */
    public function preOrderTraverse($currentNode): void
    {

        echo $currentNode->value . "\n";

        if ($currentNode->left) {
            $this->preOrderTraverse($currentNode->left);
        }
        if ($currentNode->right) {
            $this->preOrderTraverse($currentNode->right);
        }


    }

    /**
     * In Order Traverse
     */
    public function inOrderTraverse($currentNode): void
    {

        if ($currentNode->left) {
            $this->inOrderTraverse($currentNode->left);
        }

        echo $currentNode->value . "\n";

        if ($currentNode->right) {
            $this->inOrderTraverse($currentNode->right);
        }
    }

    /**
     * Post Order Traverse
     */
    public function postOrderTraverse($currentNode): void
    {
        if ($currentNode->left) {
            $this->postOrderTraverse($currentNode->left);
        }
        if ($currentNode->right) {
            $this->postOrderTraverse($currentNode->right);
        }

        echo $currentNode->value . "\n";

    }


    public function predecessor(): void
    {
        $currentNode = $this->root->right;

        while ($currentNode) {
            if (!$currentNode->left) {
                echo $currentNode->value;
            }

            $currentNode = $currentNode->left;
        }
    }

    public function successor(): void
    {
        $currentNode = $this->root->left;

        while ($currentNode) {
            if (!$currentNode->right) {
                echo $currentNode->value;
            }

            $currentNode = $currentNode->right;
        }
    }

}

$bst = new BinarySearchTree(20);

$bst->insert(30);
$bst->insert(10);
$bst->insert(4);
$bst->insert(46);
$bst->insert(2);
$bst->insert(7);
$bst->insert(50);
$bst->insert(70);
$bst->insert(15);
$bst->insert(25);
//print_r($bst->search(25));
//print_r($bst->insert(30));

$bst->successor();
$bst->predecessor();








