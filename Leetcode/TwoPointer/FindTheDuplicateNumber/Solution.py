from typing import List

class Solution:
    def findDuplicate(self, nums: List[int]) -> int:
        i = 0

        visited = set()

        nums.sort()

        while i < len(nums):

            if nums[i] in visited:
                return nums[i]
            else:
                visited.add(nums[i])
                
            i +=1