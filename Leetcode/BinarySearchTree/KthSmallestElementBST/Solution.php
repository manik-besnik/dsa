<?php

namespace KthSmallestElementBST;

class TreeNode
{
    public mixed $val = null;
    public TreeNode|null $left = null;
    public TreeNode|null $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }

}

class BinarySearchTree
{
    public TreeNode|null $root = null;

    public function insert(mixed $val): void
    {
        $treeNode = new TreeNode($val);

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


    public array $arr = [];

    /**
     * @param TreeNode|null $root
     * @param Integer $k
     * @return int|null
     */
    public function kthSmallest(TreeNode|null $root, int $k): ?int
    {
        if (!$root) {
            return null;
        }

        $this->inOrderTraverse($root);

        return $this->arr[$k - 1];
    }

    /**
     * @param TreeNode $root
     * @return void
     */
    private function inOrderTraverse(TreeNode $root): void
    {
        $currentNode = $root;

        if ($currentNode->left) {
            $this->inOrderTraverse($currentNode->left);
        }

        $this->arr[] = $currentNode->val;

        if ($currentNode->right) {
            $this->inOrderTraverse($currentNode->right);
        }

    }
}

$tree = new BinarySearchTree();

$tree->insert(5);
$tree->insert(4);
$tree->insert(3);
$tree->insert(6);
$tree->insert(7);
$tree->insert(8);
$tree->insert(2);

$s = new Solution();

var_dump($s->kthSmallest($tree->root, 2));