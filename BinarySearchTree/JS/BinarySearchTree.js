class Node {
    constructor(value, left = null, right = null) {
        this.value = value;
        this.left = left;
        this.right = right;
    }
}

class BinarySearchTree {

    constructor(value) {
        this.root = new Node(value);
    }

    insert(value) {
        let currentNode = this.root
        let node = new Node(value);
        while (true) {
            if (currentNode.value > value) {
                if (currentNode.left) {
                    currentNode = currentNode.left
                } else {
                    currentNode.left = node;
                    return
                }
            } else {
                if (currentNode.right) {
                    currentNode = currentNode.right
                } else {
                    currentNode.right = node
                    return;
                }
            }
        }
    }

    search(value) {
        let currentNode = this.root

        while (currentNode) {
            if (currentNode.value === value) {
                console.log(`Search Value Found and Value is ${value}`)
                return;
            } else if (currentNode.value > value) {
                currentNode = currentNode.left
            } else {
                currentNode = currentNode.right

            }
        }

        console.log("Value not found")
    }

    /**
     * Label Order Traverse
     *
     * Breath First Search(BFS)
     */

    traverseWithLoop(){
        const queue = [this.root]
        while (queue.length){
            let currentNode = queue[0];
            console.log(currentNode.value)

            if (currentNode.left){
                queue.push( currentNode.left)
            }
            if (currentNode.right){
                queue.push( currentNode.right)
            }

            queue.shift();
        }
    }

    /**
     * In Order Traverse
     * @param currentNode
     */
    inOrderTraverse(currentNode){
        if (currentNode.left){
            this.inOrderTraverse(currentNode.left);
        }

        console.log(currentNode.value);

        if (currentNode.right){
            this.inOrderTraverse(currentNode.right);
        }

    }
    /**
     * Pre Order Traverse
     * @param currentNode
     */
    preOrderTraverse(currentNode){

        console.log(currentNode.value);

        if (currentNode.left){
            this.preOrderTraverse(currentNode.left);
        }


        if (currentNode.right){
            this.preOrderTraverse(currentNode.right);
        }

    }
    /**
     * Post Order Traverse
     * @param currentNode
     */
    postOrderTraverse(currentNode){


        if (currentNode.left){
            this.postOrderTraverse(currentNode.left);
        }

        if (currentNode.right){
            this.postOrderTraverse(currentNode.right);
        }

        console.log(currentNode.value);

    }

    predecessor(){
        let currentNode = this.root.right;

        while (currentNode){
            if (!currentNode.left){
                console.log(currentNode.value)
            }

            currentNode = currentNode.left;
        }
    }
    successor(){
        let currentNode = this.root.left;

        while (currentNode){
            if (!currentNode.right){
                console.log(currentNode.value)
            }

            currentNode = currentNode.right;
        }
    }
}

const bst = new BinarySearchTree(40);

bst.insert(30)
bst.insert(25)
bst.insert(35)
bst.insert(50)
bst.insert(45)
bst.insert(55)
//
// bst.inOrderTraverse(bst.root)
// console.log('\n')
// bst.preOrderTraverse(bst.root)
// console.log('\n')
// bst.postOrderTraverse(bst.root)
bst.predecessor()