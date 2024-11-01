from typing import List
from collections import deque

class Solution:
    def maxSlidingWindow(self, nums: List[int], k: int) -> List[int]:
        deque_indices = deque()
        result = []

        for i in range(len(nums)):

            if deque_indices and deque_indices[0] < i - k + 1:
                deque_indices.popleft()

            while deque_indices and nums[deque_indices[-1]] < nums[i]:

                deque_indices.pop()

            deque_indices.append(i)

            if i >= k - 1:
                result.append(nums[deque_indices[0]])

        return result


s= Solution()

print(s.maxSlidingWindow([1,3,-1,-3,5,3,6,7],3))
        
