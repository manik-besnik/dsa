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
     * @return TreeNode|null
     */
    function sortedArrayToBST(array|null $nums): TreeNode|null
    {

        if($nums == null) { return null; }
        $length = count($nums);

        $middlePoint = (int) ($length / 2);



        $treeNode = new TreeNode($nums[$middlePoint]);

        $treeNode->left = $this->sortedArrayToBST(array_slice($nums,0 ,$middlePoint));

        $treeNode->right = $this->sortedArrayToBST(array_slice($nums,$middlePoint + 1));


        return $treeNode;

    }
}

$s = new Solution();

print_r($s->sortedArrayToBST([1, 2, 3,4]));