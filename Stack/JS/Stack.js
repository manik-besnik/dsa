class Node {
    constructor(value, next = null) {
        this.value = value;
        this.next = next;
    }
}

class Stack {

    constructor(value) {
        this.head = new Node(value);
        this.count = 1;
        this.top = this.head;
    }

    push(value) {
        const node = new Node(value);

        let currentNode = this.findNodeByPosition(this.count)

        currentNode.next = node;

        this.top = node;

        this.count++;

        return node;
    }

    pop() {

        let currentNode = this.findNodeByPosition(this.count - 1)

        const removeNode = currentNode.next;

        currentNode.next = null;

        this.top = currentNode;

        this.count--;

        return removeNode;
    }

    topElement() {
        return this.top;
    }

    findNodeByPosition(position) {
        let currentNode = this.head;

        let i = 1;
        while (currentNode) {

            if (i === position) {
                return currentNode;
            }
            currentNode = currentNode.next;

            i++;

        }
    }

    clearAll(){
        this.head = null;
        this.top = null;
        this.count = 0;
    }

}

const stack = new Stack(200);

stack.push(300)
stack.push(400)
stack.push(500)
stack.pop();

console.log(stack.count)

