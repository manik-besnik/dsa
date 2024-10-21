from typing import List
class Solution:
    def singleNumber(self, nums: List[int]) -> int:

        map = {}

        for i in range(len(nums)):
            if nums[i] in map:
                map[nums[i]] +=1
            else: 
                map[nums[i]] = 1

        for key,value in map.items():
            if value == 1:
                return key
            
obj = Solution()

print(obj.singleNumber([1]))