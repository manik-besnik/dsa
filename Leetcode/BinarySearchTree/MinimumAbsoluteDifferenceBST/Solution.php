<?php

namespace MinimumAbsoluteDifferenceBST;

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
     * @return int|null
     */
    public function getMinimumDifference(TreeNode|null $root): ?int
    {
        if (!$root) {
            return null;
        }


        $this->inOrderTraverse($root);

        $length  = count($this->arr);
        if($length === 0){
            return null;
        }
        if($length === 2){
            return abs($this->arr[0] - $this->arr[1]);
        }

        $min = PHP_INT_MAX;

        for ($i = 1; $i < $length; $i++){
            $subtract = $this->arr[$i] - $this->arr[$i -1];

            $min = min($min, $subtract);
        }

        return $min;
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

var_dump($s->getMinimumDifference($tree->root));