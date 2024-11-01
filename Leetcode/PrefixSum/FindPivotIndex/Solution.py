from typing import List

class Solution:
    def pivotIndex(self, nums: List[int]) -> int:

        leftSum, rightSum = 0, sum(nums)
        
        for i in range(len(nums)):
            rightSum -= nums[i]
           
            if leftSum == rightSum:
                return i 
            leftSum += nums[i]
        return -1  


s = Solution()

print(s.pivotIndex([1,7,3,6,5,6]))