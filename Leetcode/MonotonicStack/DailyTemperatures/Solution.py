from typing import List

class Solution:
    def dailyTemperatures(self, temperatures: List[int]) -> List[int]:
        length = len(temperatures)
        result = [0] * length
        stack = []
        
        for i in range(length):
            
            while stack and temperatures[i] > temperatures[stack[-1]]:
                prev_index = stack.pop()
                result[prev_index] = i - prev_index
                
            stack.append(i)
                
        return result
    
s = Solution()

print(s.dailyTemperatures([73,74,75,71,69,72,76,73]))