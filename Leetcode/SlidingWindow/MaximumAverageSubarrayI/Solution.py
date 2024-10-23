from typing import List
class Solution:
    def findMaxAverage(self, nums: List[int], k: int) -> float:
        
        sum = 0
        result = 0
        for i in range(k):
            sum += nums[i]

        result = sum / k


        for i in range(k,len(nums)):
            sum = sum + nums[i] - nums[i-k]
            avg = sum/k
            result = max(avg, result)

        return "{:.5f}".format(result) 

s  = Solution()

print(s.findMaxAverage([5],1))