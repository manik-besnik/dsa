import collections
from types import List

class Solution:
    def ladderLength(self, beginWord: str, endWord: str, wordList: List[str]) -> int:
        if endWord not in wordList:
            return 0
        
        nei = collections.defaultdict(list)
        
        wordList.append(beginWord)
        
        for word in wordList:
            for i in range(len(word)):
                pattern = word[:i] + "*" + word[i+1:]
                nei[pattern].append(word)
                
        visit = set([beginWord])
        q = collections.deque([beginWord])
        result = 1
        
        while q:
            for i in range(len(q)):
                word = q.popleft()
                
                if word == endWord:
                    return result
                for i in range(len(word)):
                    pattern = word[:i] + "*" + word[i+1:]
                    
                    for neiWord in nei[pattern]:
                        if neiWord not in visit:
                            visit.add(neiWord)
                            q.append(neiWord)
                            
            result +=1
        return 0
        