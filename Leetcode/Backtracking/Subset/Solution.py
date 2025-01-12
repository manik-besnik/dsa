from typing import List
class Solution:
    def subsets(self, nums: List[int]) -> List[List[int]]:
        result = []
        
        current = []
        
        def dfs(i):
            if i >= len(nums):
                result.append(current[:])
                return
                
            current.append(nums[i])
            dfs(i+1)
            current.pop()
            dfs(i+1)
            
        dfs(0)
        
        return result
    
s = Solution()

print(s.subsets([1,2,3]))