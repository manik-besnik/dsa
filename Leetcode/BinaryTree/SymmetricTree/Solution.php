<?php

namespace SymmetricTree;


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
     * @return Boolean
     */
    function isSymmetric(TreeNode|null $root): bool
    {

        if (!$root) {
            return true;
        }

        $queue = [[$root->left, $root->right]];

        while (!empty($queue)) {
            $newQueue = [];

            foreach ($queue as [$leftNode, $rightNode]) {
                if ($leftNode === null && $rightNode === null) {
                    continue;
                }

                if ($leftNode->val !== $rightNode->val || $leftNode === null || $rightNode === null) {
                    return false;
                }
                $newQueue[] = [$leftNode->left, $rightNode->right];
                $newQueue[] = [$leftNode->right, $rightNode->left];
            }

            $queue = $newQueue;
        }
        return true;

    }

    private function isNodesMirror(?TreeNode $leftNode, ?TreeNode $rightNode): bool
    {
        if ($leftNode === null && $rightNode === null) {
            return true;
        }
        if ($leftNode === null || $rightNode === null) {
            return false;
        }
        return $leftNode->val === $rightNode->val &&
            $this->isNodesMirror($leftNode->left, $rightNode->right) &&
            $this->isNodesMirror($leftNode->right, $rightNode->left);
    }
}