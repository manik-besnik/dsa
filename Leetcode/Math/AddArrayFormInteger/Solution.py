from typing import List
import sys

class Solution:
    def addToArrayForm(self, num: List[int], k: int) -> List[int]:
            
            num_str = ''.join(map(str, num))
            
            if len(num_str) > 4300:
                sys.set_int_max_str_digits(10000)

            sum_str = str(int(num_str) + k)
           
            return [int(ch) for ch in sum_str]
    
object = Solution()

print(object.addToArrayForm([1,2,0,0],34))