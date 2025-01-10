from typing import List

from collections import Counter

class Solution:
    def uniqueOccurrences(self, arr: List[int]) -> bool:
        
        counts = Counter(arr)

        return len(set(counts.values())) == len(counts.values())
    
    
        occurs = {}

        for i in arr:
            if i in occurs:
                occurs[i] +=1
            else:
                occurs[i] = 0
                
        occurSet = set()
        
        for value in occurs.values():
            if value in occurSet:
                return False
            else:
                occurSet.add(value)
        return True