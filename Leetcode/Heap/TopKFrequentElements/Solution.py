from typing import List
class Solution:
    def topKFrequent(self, nums: List[int], k: int) -> List[int]:
        result = []

        map = {}

        for i in range(len(nums)):

            if nums[i] in map:
                map[nums[i]] += 1
            else:
                map[nums[i]] = 1

        for i in range(k):
            curr_max_idx = max(map, key=map.get)
            result.append(curr_max_idx)
            map.pop(curr_max_idx)


        return result
    

s = Solution()

print(s.topKFrequent([1,1,1,2,2,3],2))
        