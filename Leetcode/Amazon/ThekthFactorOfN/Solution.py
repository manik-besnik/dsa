class Solution:
    def kthFactor(self, n: int, k: int) -> int:
        nums = []

        for i in range(1,n + 1):
            if n % i == 0:
                nums.append(i)
        
        

        for i in range(len(nums)):
            if i == k -1:
                return nums[i]
            
        return - 1
        
        


obj  = Solution()

print(obj.kthFactor(4,4))