<?php

namespace PathSum;


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
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum(TreeNode|null $root, int $targetSum): bool
    {

        if (!$root) {
            return false;
        }

        return $this->dfs($root, $targetSum, 0);

    }

    private function dfs(TreeNode|null $root, $targetSum, $currentSum): bool
    {

        if (!$root) {
            return false;
        }

        $currentSum += $root->val;

        if ($root->left && $root->right) {
            return $currentSum === $targetSum;
        }

        return ($this->dfs($root->left, $targetSum, $currentSum) ||
            $this->dfs($root->right, $targetSum, $currentSum));
    }
}