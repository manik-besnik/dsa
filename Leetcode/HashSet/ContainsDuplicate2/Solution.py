from typing import List

class Solution:
    def containsNearbyDuplicate(self, nums: List[int], k: int) -> bool:
        l = 0
        window = set()
        for r in range(len(nums)):
            if r - l > k:
                window.remove(nums[l])
                l +=1
            if nums[r] in window: 
                return True
            window.add(nums[r])

        return False
    

s = Solution()

print(s.containsNearbyDuplicate([1,2,3,1,2,3],2))
                

            