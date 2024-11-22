from typing import Optional

class ListNode:
    def __init__(self, val=0, next=None):
        self.val = val
        self.next = next
        
        
class LinkedList:
    
    def __init__(self) -> None:
        self.head = None
        self.tail = None
        
        
    def apppend(self, val):
        node = ListNode(val)

        if not self.head: 
            
            self.head = node
            self.tail = node

        else:
            self.tail.next = node
            self.tail = node
            
class Solution:
    def reverseKGroup(self, head: Optional[ListNode], k: int) -> Optional[ListNode]:
        
        if not head: return None
        
        if k == 1: return None
        
        prev  = None
        current = head
        
        count = 1
        
        while current:
            
            if count == k:
                count = 1
                prev = None
                
                continue

            next = current.next
            current.next = prev
            prev = current
            current = next
            count +=1
            
        return prev
            
        