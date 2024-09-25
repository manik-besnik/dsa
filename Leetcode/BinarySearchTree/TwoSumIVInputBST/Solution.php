<?php

namespace TwoSumIVInputBST;

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
     * @param TreeNode $root
     * @param Integer $k
     * @return Boolean
     */
    function findTarget(TreeNode $root, int $k): bool
    {

        if (!$root->left && !$root->right) {
            return false;
        }

        $this->dfs($root);

        $left = 0;
        $right = count($this->nums) - 1;

        while ($left < $right) {

            $sum = $this->nums[$left] + $this->nums[$right];

            if ($sum === $k) {
                var_dump($this->nums);
                return true;
            } elseif ($this->nums[$left] + $this->nums[$right] > $k) {
                $right--;
            } else {
                $left++;
            }
        }

        return false;

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

$tree = new BinarySearchTree();


$tree->insert(2);
$tree->insert(3);
//$tree->insert(9);
//$tree->insert(10);
//$tree->insert(11);

$s = new Solution();

var_dump($s->findTarget($tree->root, 6));