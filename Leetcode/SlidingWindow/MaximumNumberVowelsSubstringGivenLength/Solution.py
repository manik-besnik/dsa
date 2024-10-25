class Solution:
    def maxVowels(self, s: str, k: int) -> int:
        vowels = "aeiou"
        current_vowels = sum(1 for char in s[:k] if char in vowels)
        max_vowels = current_vowels


        for i in range(k, len(s)):

            if s[i - k] in vowels:
                current_vowels -= 1

            if s[i] in vowels:
                current_vowels += 1

            max_vowels = max(max_vowels, current_vowels)

        return max_vowels
    
s = Solution()

print(s.maxVowels('abciiidef',3))