from typing import Optional

class ListNode:
    def __init__(self, val=0, next=None):
        self.val = val
        self.next = next

class Solution:
    def reverseKGroup(self, head: Optional[ListNode], k: int) -> Optional[ListNode]:
        count = 0
        curr = head
        while curr and count < k:
            curr = curr.next
            count += 1
        
        if count == k:
            #reverse nodes, set next to recurse
            nextGroup = curr
            curr = head
            prev = self.reverseKGroup(nextGroup, k)
            while count > 0:
                next = curr.next
                curr.next = prev
                prev = curr
                curr = next
                count -= 1
            head = prev
        
        return head