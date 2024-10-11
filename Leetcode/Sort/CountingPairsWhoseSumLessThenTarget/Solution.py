from typing import List
class Solution:
    def countPairs(self, nums: List[int], target: int) -> int:
        nums.sort()

        pairs = 0
        i,j = 0,len(nums) - 1

        while i <j:
            if nums[i] + nums[j] < target:
                
                pairs += j - i
                i+=1
            else:
                j-=1

        return pairs
            
object = Solution()

print(object.countPairs([-6,2,5,-2,-7,-1,3],-2))