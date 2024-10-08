from typing import List

class Solution:
    def twoSum(self, nums: List[int], target: int) -> List[int]:
        result = {}

        for i in range(len(nums)):
            index = target - nums[i]
            if index in result:
                return [result[index], i]
            else:
                result[nums[i]] = i

        return []

obj = Solution()

print(obj.twoSum([3,3],6))