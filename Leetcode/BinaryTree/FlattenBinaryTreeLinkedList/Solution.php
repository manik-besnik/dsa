<?php

namespace FlattenBinaryTreeLinkedList;


use SplQueue;

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
     * @return void|null
     */
    function flatten(TreeNode|null $root)
    {
        if ($root === null) {
            return;
        }
        $queue = new SplQueue();

        $this->preOrder($queue, $root->left, $root->right);

        $prev = $root;
        $prev->left = null;

        while ($queue->count() >= 1) {
            $now = $queue->dequeue();
            if ($now === null) return;
            $now->left = null;
            $prev->right = $now;
            $prev = $now;
        }
    }

    private function preOrder($queue, $left, $right): void
    {
        if ($left !== null) {
            $queue->enqueue($left);
            $this->preOrder($queue, $left->left, $left->right);
        }

        if ($right !== null) {
            $queue->enqueue($right);
            $this->preOrder($queue, $right->left, $right->right);
        }

    }

    /**
     * @param TreeNode|null $root
     * @return TreeNode|null
     */

//    function flatten(TreeNode|null $root): TreeNode|null
//    {
//        if (!$root) {
//            return $root;
//        }
//
//        $this->dfs($root);
//
//        return $root;
//
//    }
//
//    private function dfs(TreeNode|null $root): TreeNode|null
//    {
//        if (!$root) {
//            return null;
//        }
//
//
//        $leftTail = $this->dfs($root->left);
//        $rightTail = $this->dfs($root->right);
//
//        if ($root->left) {
//            $leftTail->right = $root->right;
//            $root->right = $root->left;
//            $root->left = null;
//        }
//
//
//        return $rightTail ?? $leftTail ?? $root;
//    }
}