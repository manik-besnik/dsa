from typing import List

class Solution:
    def largestAltitude(self, gain: List[int]) -> int:
        altitudes = {0:0}
        
        for i in range(len(gain)):
            
            altitudes[i + 1] = altitudes[i] + gain[i]

        
        return max(altitudes.values())
    
s = Solution()

print(s.largestAltitude([-4,-3,-2,-1,4,3,2]))