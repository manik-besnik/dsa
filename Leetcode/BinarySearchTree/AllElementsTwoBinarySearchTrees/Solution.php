<?php

namespace AllElementsTwoBinarySearchTrees;


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
    private array $nums = [];

    /**
     * @param TreeNode|null $root1
     * @param TreeNode|null $root2
     * @return Integer[]
     */
    function getAllElements(TreeNode|null $root1, TreeNode|null $root2): array
    {

        if ($root1) {
            $this->dfs($root1);
        }
        if ($root2) {
            $this->dfs($root2);
        }

        sort($this->nums);
        return $this->nums;

    }

    private function dfs(TreeNode $root): void
    {

        if ($root->left) {
            $this->dfs($root->left);
        }

        $this->nums[] = $root->val;

        if ($root->right) {
            $this->dfs($root->right);
        }

    }
}