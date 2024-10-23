from typing import Optional
import math

class ListNode:
    def __init__(self, val = 0, next = None):
        self.val = val
        self.next = next

class LinkedList:
    def __init__(self) -> None:
        self.head = None
        self.tail = None

    def add(self,val):
        node = ListNode(val)

        if not self.head:
            self.head = node
            self.tail = node
            return
        
        self.tail.next = node
        self.tail = node


class Solution:
    def deleteMiddle(self, head: Optional[ListNode]) -> Optional[ListNode]:

        if not head or not head.next:
            return None
        

        slow,fast = head,head

        prev = None

        while fast and fast.next:
            prev = slow
            slow = slow.next
            fast = fast.next.next

        if prev.next:
            prev.next = slow.next

        return head
    

linkedList = LinkedList()

linkedList.add(1)
linkedList.add(2)
# linkedList.add(3)
# linkedList.add(4)
# linkedList.add(5)

s = Solution()


# print(linkedList.head)
print(s.deleteMiddle(linkedList.head))
        