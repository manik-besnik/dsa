from typing import List
class Solution:
    def countNicePairs(self, nums: List[int]) -> int:
        nice_pairs = 0
        reverse_nums = {}
        n = len(nums)
# [10,13,24,35,76]
# [76,35,24,13,10]
        for i in range(n):
            reverse_nums[nums[i]] = int(str(nums[i])[::-1])

        for i in range(n - 1):
            num = nums[i]
            reverse_num = reverse_nums[nums[i]]

            for j in range(i+1, n):


                
                print("number second",nums[j] + reverse_num)
                print("reverse number second",(num + reverse_nums[nums[j]]))
                
                if (nums[j] + reverse_num) == (num + reverse_nums[nums[j]]):
                    nice_pairs +=1

            
                if i == 3: return nice_pairs
        return nice_pairs
            

        
    
obj = Solution()

print(obj.countNicePairs([13,10,35,24,76]))