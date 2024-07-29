class Node {
    constructor(value, next = null, prev = null) {
        this.value = value;
        this.next = next;
        this.prev = prev;

    }
}

class LinkList {

    constructor(value) {
        const node = new Node(value);
        this.head = node;
        this.tail = node;
        this.tail.next = this.head
        this.length = 1;
    }

    append(value) {

        const newNode = new Node(value);

        const lastNode = this.findLast();

        newNode.prev = lastNode;

        lastNode.next = newNode;

        this.tail = newNode;


        this.length++;
    }

    appendAt(value, position) {
        const newNode = new Node(value);

        const currentNode = this.findNode(position - 1);

        newNode.next = currentNode.next;

        currentNode.next = newNode

        newNode.prev = currentNode;

        this.length++;
    }

    findNode(position) {


        let currentNode = this.head;

        let i = 1;

        while (currentNode) {
            if (i === position) {
                return currentNode;
            }

            currentNode = currentNode.next
        }

    }

    findLast() {
        let currentNode = this.head;

        let count = 1;
        while (count < this.length) {
            currentNode = currentNode.next
        }
        return currentNode
    }
}

const linkList = new LinkList(50);

linkList.append(100)
// linkList.append(150)
// linkList.append(250)
// linkList.appendAt(200, 2)
// linkList.appendAt(250, 2)
// linkList.append(400)
// console.log(linkList.length)
console.log(linkList.findLast())
// console.log(linkList.tail)