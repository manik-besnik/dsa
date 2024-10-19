from typing import List
class Solution:

     def getReverseDiff(self, x):
        rev = 0
        num = x
        while num:  
            rev *= 10
            rev += num % 10
            num //= 10
        return x - rev  


     def countNicePairs(self, nums):
        umap = {}
        num_pairs = 0
        for num in nums:
            diff = self.getReverseDiff(num)
            num_pairs += umap.get(diff, 0)
            umap[diff] = umap.get(diff, 0) + 1
        return num_pairs % int(1e9 + 7) 
        
    
obj = Solution()

print(obj.countNicePairs([13,10,35,24,76]))