class Solution:
    def mergeAlternately(self, word1: str, word2: str) -> str:
        length1 = len(word1)
        length2 = len(word2)
        length = max(length1,length2)

        result = ""

        for i in range(length):
            if i < length1:
                result += word1[i]
            if i < length2:
                result += word2[i]

        return result
    
s = Solution()

print(s.mergeAlternately("ab","pqrs"))