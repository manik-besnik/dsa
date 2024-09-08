<?php

namespace SumRootLeafNumbers;

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
    /**
     * @param TreeNode|null $root
     * @return Integer
     */
    function sumNumbers(TreeNode|null $root): int
    {

        if (!$root) {
            return 0;
        }

        return $this->dfs($root, 0);

    }

    private function dfs(TreeNode|null $root, $currentSum)
    {
        if (!$root) {
            return 0;
        }

        $currentSum += ($currentSum * 10) + $root->val;

        if (!$root->left && !$root->right){
            return $currentSum;
        }

        return $this->dfs($root->left, $currentSum) +
            $this->dfs($root->right, $currentSum);
    }
}