<?php

namespace ConstructBinaryTreeInorderPreorder;


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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    private int $preOrderIndex = 0;
    function buildTree($preorder, $inorder): ?TreeNode
    {
        $start = 0;
        $end = count($inorder) - 1;
        return $this->trace($preorder, $inorder,$start,$end);
    }

    function trace($preorder, $inorder,$start,$end): ?TreeNode
    {
        if($start > $end) return null;

        $root = new TreeNode($preorder[$this->preOrderIndex]);
        $this->preOrderIndex++;

        $iIndex = array_search($root->val, $inorder);

        $root->left =  $this->trace($preorder, $inorder,$start,$iIndex -1);
        $root->right =  $this->trace($preorder, $inorder,$iIndex+1,$end);

        return $root;

    }
}