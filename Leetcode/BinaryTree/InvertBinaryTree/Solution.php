<?php

namespace InvertBinaryTree;

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

    public TreeNode|null $root;

    /**
     * @param TreeNode|null $root
     * @return TreeNode|null TreeNode
     */
    function invertTree(TreeNode|null $root): TreeNode|null
    {
        $this->root = $root;

        if (!$root) {
            return $root;
        }
        $this->invert($this->root);

        return $this->root;

    }

    /**
     * @param TreeNode $root
     */
    private function invert(TreeNode $root): void
    {

        $temp1 = $root->left;
        $temp2 = $root->right;
        $root->left = $temp2;
        $root->right = $temp1;


        if ($root->left) {
            $this->invert($root->left);
        }
        if ($root->right) {
            $this->invert($root->right);
        }
    }
}