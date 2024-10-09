class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        map = {}
        length = len(s)
        max_length = 0
        left = 0

        for right in range(length):

            if s[right] not in map or map[s[right]] < left:
    
                max_length = max(max_length, right - left + 1)

            else:

                left = map[s[right]] + 1

            map[s[right]] = right


        return max_length
    
obj = Solution()

print(obj.lengthOfLongestSubstring('pwwkew'))