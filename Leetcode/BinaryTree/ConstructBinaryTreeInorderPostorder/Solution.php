<?php

namespace ConstructBinaryTreeInorderPostorder;


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
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode|null
     */
    function buildTree(array $inorder, array $postorder): ?TreeNode
    {

        $inorderMap = [];
        foreach ($inorder as $index => $value) {
            $inorderMap[$value] = $index;
        }

        return $this->build(0, count($inorder) - 1, $postorder, $inorderMap);
    }

    private function build($left, $right, array &$postorder, array $inorderMap): ?TreeNode
    {

        if ($left > $right) {
            return null;
        }

        $rootValue = array_pop($postorder);
        $root = new TreeNode($rootValue);


        $index = $inorderMap[$rootValue];


        $root->right = $this->build($index + 1, $right, $postorder, $inorderMap);
        $root->left = $this->build($left, $index - 1, $postorder, $inorderMap);

        return $root;
    }
}