from typing import List
class Solution:
    def compress(self, chars: List[str]) -> int:
        map = {}

        for i in range(len(chars)):

            if chars[i] in map:
                map[chars[i]] +=1
            else:
                map[chars[i]] =1

        chars = []

        for key,value in map.items():
            chars.append(value)
            chars.append(key)

        return len(chars)
    
s = Solution()

print(s.compress(["a","a","b","b","c","c","c"]))