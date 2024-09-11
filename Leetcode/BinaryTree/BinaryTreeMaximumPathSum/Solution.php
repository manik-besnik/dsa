<?php

namespace BinaryTreeMaximumPathSum;


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
    public array $result = [];

    /**
     * @param TreeNode $root
     * @return int|null
     */
    public function maxPathSum(TreeNode $root): ?int
    {

        $this->result = [$root->val];

        $this->dfs($root);

        return $this->result[0];

    }

    private function dfs(TreeNode|null $root)
    {
        if (!$root) {
            return 0;
        }

        $leftMax = $this->dfs($root->left);
        $rightMax = $this->dfs($root->right);
        $leftMax = max($leftMax, 0);
        $rightMax = max($rightMax, 0);

        $this->result[0] = max($this->result[0], $root->val + $leftMax + $rightMax);

        return $root->val + max($leftMax, $rightMax);
    }
}