<?php

namespace BinarySearchTreeIterator;

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


class BSTIterator
{


    public int $index = -1;

    public array $treeArr = [];

    /**
     * @param TreeNode|null $root
     */
    function __construct(public TreeNode|null $root = null)
    {
        $this->dfs($root);
    }

    /**
     * @return int|null
     */
    function next(): ?int
    {
        if ($this->treeArr[++$this->index]) {
            return $this->treeArr[$this->index];
        }

        return 0;
    }

    /**
     * @return Boolean
     */
    function hasNext(): bool
    {
        return isset($this->treeArr[$this->index + 1]);
    }

    private function dfs(TreeNode|null $root = null): void
    {
        if (!$root) {
            return;
        }

        if ($root->left) {
            $this->dfs($root->left);
        }

        $this->treeArr[] = $root->val;

        if ($root->right) {
            $this->dfs($root->right);
        }
    }
}

$tree = new BinarySearchTree();

$tree->insert(7);
$tree->insert(3);
$tree->insert(15);
$tree->insert(9);
$tree->insert(20);
print_r($tree->root);

$bst = new BSTIterator($tree->root);

print_r($bst->treeArr);