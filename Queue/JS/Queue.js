class Node {
    constructor(value, next = null) {
        this.value = value;
        this.next = next;
    }
}

class Queue {

    constructor(value) {
        this.head = new Node(value);
    }

    enqueue(value) {

        const node = new Node(value);

        let currentNode = this.findLastNode()

        currentNode.next = node;

        return node;
    }

    dequeue() {

        let currentNode = this.head

        this.head = currentNode.next;

        return currentNode;
    }


    findLastNode() {

        let currentNode = this.head;

        while (currentNode) {

            if (!currentNode.next) {
                return currentNode;
            }

            currentNode = currentNode.next;

        }

        return currentNode;
    }


}

const queue = new Queue(200);

queue.enqueue(300)
queue.enqueue(400)
queue.enqueue(500)
queue.dequeue();

console.log(queue.head)

