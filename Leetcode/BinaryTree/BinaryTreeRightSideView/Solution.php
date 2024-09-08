<?php

namespace BinaryTreeRightSideView;

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
    public array $arr = [];

    /**
     * @param TreeNode|null $root
     * @return array
     */
    public function rightSideView(?TreeNode $root): array
    {
        if (!$root) {
            return [];
        }

        $this->dfs($root, 0);

        return $this->arr;
    }

    /**
     * @param TreeNode|null $node
     * @param int $depth
     * @return void
     */
    private function dfs(TreeNode|null $node, int $depth): void
    {
        if (!$node) {
            return;
        }


        if ($depth === count($this->arr)) {
            $this->arr[] = $node->val;
        }

        if ($node->right) {
            $this->dfs($node->right, $depth + 1);
        }

        if ($node->left) {
            $this->dfs($node->left, $depth + 1);
        }
    }
}

$tree = new BinarySearchTree();


$tree->insert(1);
$tree->insert(2);

$s = new Solution();

var_dump($s->rightSideView($tree->root));