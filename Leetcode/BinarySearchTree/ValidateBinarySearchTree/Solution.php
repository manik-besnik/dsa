<?php

namespace ValidateBinarySearchTree;


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
     * @return bool
     */
    public function isValidBST(?TreeNode $root): bool
    {
        if (!$root) {
            return false;
        }

        return $this->isValidBSTHelper($root);

    }

    /**
     * @param TreeNode|null $node
     * @param int|null $min
     * @param int|null $max
     * @return bool
     */
    private function isValidBSTHelper(?TreeNode $node, int|null $min = null, int|null $max = null): bool
    {
        if ($node === null) {
            return true;
        }


        if (($min !== null && $node->val <= $min) || ($max !== null && $node->val >= $max)) {
            return false;
        }


        return $this->isValidBSTHelper($node->left, $min, $node->val) &&
            $this->isValidBSTHelper($node->right, $node->val, $max);
    }
}

$tree = new BinarySearchTree();


$tree->insert(1);
$tree->insert(2);

$s = new Solution();

var_dump($s->isValidBST($tree->root));