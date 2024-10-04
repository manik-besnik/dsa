class ListNode:
    def __init__(self,val) -> None:
        self.val = val
        self.next = None

class MyLinkedList:

    def __init__(self):
        self.head = None
        self.tail = None

    def get(self, index: int) -> int:
        if not self.head:
            return -1
        
        count = 0

        current = self.head

        while current:
            if(index == count):
                return current.val
            
            count = count + 1
            
            current = current.next

        return -1

        
    def addAtHead(self, val: int) -> None:

        node = ListNode(val)

        if not self.head:
            self.head = node
            self.tail = node
        else:
            node.next = self.head
            self.head = node
        

    def addAtTail(self, val: int) -> None:

        node = ListNode(val)

        if not self.head:
            self.head = node
            self.tail = node
        else:
            self.tail.next = node
            self.tail = node


    def addAtIndex(self, index: int, val: int) -> None:
        node = ListNode(val)

        if(index == 0):
            self.addAtHead(val)
            return
        
        count = 0
        current = self.head

        while current:
            if count == (index - 1):
                next = current.next
                current.next = node
                node.next = next
                if not next:
                    self.tail = node
                return
            
            if count == index - 1:
                node.next = current.next
                current.next = node
                if node.next is None:
                    self.tail = node
                return
            count += 1
            current = current.next
            

    
    def deleteAtIndex(self, index: int) -> None:

        if not self.head:
            return
        
        if index == 0:
            if not self.head.next:
                self.head = None
                self.tail = None
            else: 
                self.head = self.head.next
            return
        
        count = 0
        current = self.head

        while current.next:
            if count == index - 1:
                if current.next == self.tail:
                    current.next = None
                    self.tail = current
                else:
                    current.next = current.next.next
                return
            count += 1
            current = current.next

        
    def iterate(self):
        current = self.head
        while current:

            print(current.val)
            current = current.next



myLinkedList = MyLinkedList()
myLinkedList.addAtHead(7)
myLinkedList.addAtHead(2)
myLinkedList.addAtHead(1)
myLinkedList.addAtIndex(3,0)
myLinkedList.deleteAtIndex(2)
myLinkedList.addAtHead(6)
myLinkedList.addAtTail(4)
print(myLinkedList.get(4))
# print(myLinkedList.tail.val)
# print(myLinkedList.get(0))