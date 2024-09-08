<?php

namespace BinaryTreeLevelOrderTraversal;


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
    public array $result = [];

    /**
     * @param TreeNode|null $root
     * @return Integer[][]
     */
    function levelOrder(TreeNode|null $root): array
    {

        if (!$root) {
            return [];
        }
        $queue = [$root];

        while (!empty($queue)){
            $len = count($queue);

            $label = [];

            for ($i = 0; $i < $len ; $i++){
                $currentNode = array_shift($queue);
                $label[] = $currentNode->val;

                if($currentNode->left){
                    $queue[] = $currentNode->left;
                }
                if($currentNode->right){
                    $queue[] = $currentNode->right;
                }
            }

            $this->result[] = $label;
        }


        return $this->result;

    }


}