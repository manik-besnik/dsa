from typing import List
class Solution:
    def compress(self, chars: List[str]) -> int:
        i = 0
        j = 0
        while j < len(chars):
            count = 0
            curr = chars[j]
            
            while j < len(chars) and chars[j] == curr:
                j += 1
                count += 1
                
            chars[i] = curr
            i += 1
            if count > 1:
                for digit in str(count):
                    chars[i] = digit
                    i += 1
                    
        return i
    
s = Solution()

print(s.compress(["a","a","b","b","c","c","c"]))