class Solution:
    def removeStars(self, s: str) -> str:

        if not s:
            return ""
        
        result = ""

        for char in s:
            if char == '*':
                result = result[:-1]
            else:
                result = result+char

        return result
    
s = Solution()

print(s.removeStars('leet**cod*e'))
