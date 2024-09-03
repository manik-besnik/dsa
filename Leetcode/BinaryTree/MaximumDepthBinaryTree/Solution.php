<?php

namespace MaximumDepthBinaryTree;


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
    function maxDepth(TreeNode|null $root): int
    {
        if (!$root) {
            return 0;
        }


        return max($this->maxDepth($root->left), $this->maxDepth($root->right)) + 1;

    }

}

$tree = new BinarySearchTree();

$tree->insert(6);
$tree->insert(10);
$tree->insert(4);
$tree->insert(5);
$tree->insert(3);

$s = new Solution();

print_r($s->maxDepth($tree->root));