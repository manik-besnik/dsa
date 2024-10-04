class Node:
    def __init__(self,val):
        self.val = val
        self.next = None

class LinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def prepend(self, val):
        node = Node(val)

        if not self.head:
            self.head = node
            self.tail = node
        else:
            head = self.head
            self.head = node
            self.head.next = head

    def apppend(self, val):
        node = Node(val)

        if not self.head: 
            
            self.head = node
            self.tail = node

        else:
            self.tail.next = node
            self.tail = node

    def printNode(self,node):
        
        if not node:
            return
        else:
            print(node.val)
            self.printNode(node.next)

    def iterate(self):
        node = self.head

        while node:
            print(node.val)
            node = node.next


ll = LinkedList()
ll.prepend(0)
ll.apppend(1)
ll.apppend(2)
ll.apppend(3)
ll.apppend(4)
ll.iterate()

