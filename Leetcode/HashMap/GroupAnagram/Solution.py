from collections import defaultdict
from typing import List

class Solution:
    def groupAnagrams(self, strs: List[str]) -> List[List[str]]:

        anagrams_dict = defaultdict(list)

       

        for str in strs:
            
            count = [0] * 26
            for c in str:
                count[ord(c) - ord('a')] +=1
            key = tuple(count)

            anagrams_dict[key].append(str)
            

        return anagrams_dict.values()
    

s = Solution()

print(s.groupAnagrams(["eat","tea","tan","ate","nat","bat"]))




