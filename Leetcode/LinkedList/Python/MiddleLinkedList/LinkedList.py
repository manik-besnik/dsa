from typing import Optional

class Node:
    def __init__(self,val):
        self.val = val
        self.next = None

class ListNode:
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


class Solution:
    def middleNode(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head:
            return head
        
        fast = head
        slow = head

        while fast and fast.next:

            fast = fast.next.next
            slow = slow.next
        return slow

ll = LinkedList()
ll.prepend(0)
ll.apppend(1)
ll.apppend(2)
ll.apppend(3)
ll.apppend(4)
ll.iterate()

obj = Solution()

print(obj.middleNode(ll.head).val)

