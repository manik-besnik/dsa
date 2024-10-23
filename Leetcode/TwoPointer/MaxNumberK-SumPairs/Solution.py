from typing import List
class Solution:
    def maxOperations(self, nums: List[int], k: int) -> int:

        if not nums:
            return 0
        
        result = 0

        nums.sort()

        length = len(nums);

        j = length - 1
        i = 0

        while i < j:
            if nums[i] + nums[j] == k:
                result += 1
                i +=1
                j -=1
            elif nums[i] + nums[j] > k:
                j -=1
            else:
                i +=1


        return result
    
s = Solution()

print(s.maxOperations([4,4,1,3,1,3,2,2,5,5,1,5,2,1,2,3,5,4],2))
