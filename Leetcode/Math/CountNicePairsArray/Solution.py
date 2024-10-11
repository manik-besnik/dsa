from typing import List
class Solution:
    def countNicePairs(self, nums: List[int]) -> int:
        nice_pairs = 0

        for i in range(len(nums) - 1):

            num_i = str(nums[i])[::-1]
            num_j = str(nums[i + 1])[::-1]

            if nums[i] + int(num_j) == nums[i + 1] + int(num_i):
                nice_pairs +=1

        return nice_pairs
    
obj = Solution()

print(obj.countNicePairs([13,10,35,24,76]))