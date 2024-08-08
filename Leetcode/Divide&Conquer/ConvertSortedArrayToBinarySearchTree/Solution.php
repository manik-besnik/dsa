<?php


namespace ConvertSortedArrayToBinarySearchTree;

class TreeNode
{

    public function __construct(
        public int           $val,
        public TreeNode|null $left = null,
        public TreeNode|null $right = null
    )
    {
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST(array $nums): TreeNode
    {

        $length = count($nums);

        $middlePoint = ($length / 2);

        if ($length % 2 === 1) {
            $middlePoint = floor($length / 2);
        }

        $head = new TreeNode($nums[$middlePoint]);

        $count = 0;

        while ($count < $middlePoint){
            $this->insert($head,$nums[$count]);
            $count++;
        }

        $count = $middlePoint +1;

        while ($count < $length){
            $this->insert($head,$nums[$count]);
            $count++;
        }


        return $head;

    }

    private function insert(TreeNode $root,int $value): void
    {
        $node = new TreeNode($value);

        $currentNode = $root;

        while (true) {
            if ($currentNode->val > $value) {

                if ($currentNode->left) {
                    $currentNode = $currentNode->left;
                } else {
                    $currentNode->left = $node;
                    return;
                }

            }
            if ($currentNode->val < $value) {
                if ($currentNode->right) {
                    $currentNode = $currentNode->right;
                } else {
                    $currentNode->right = $node;
                    return;
                }
            }
        }


    }
}

$s = new Solution();

print_r($s->sortedArrayToBST([1, 2, 3,4]));