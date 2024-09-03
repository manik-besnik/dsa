<?php

namespace CountCompleteTreeNodes;
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
    public int $count = 0;

    /**
     * @param TreeNode|null $root
     * @return int
     */
    public function countNodes(?TreeNode $root): int
    {
        if (!$root) {
            return 0;
        }

        $this->dfs($root, 0);

        return $this->count;
    }

    /**
     * @param TreeNode $node
     * @return void
     */
    private function dfs(TreeNode $node): void
    {
        $this->count++;

        if ($node->right) {
            $this->dfs($node->right);
        }

        if ($node->left) {
            $this->dfs($node->left);
        }
    }
}

$tree = new BinarySearchTree();


$tree->insert(1);
$tree->insert(2);

$s = new Solution();

var_dump($s->rightSideView($tree->root));