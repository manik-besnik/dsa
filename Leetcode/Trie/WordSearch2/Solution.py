from typing import List
class TrieNode:
    
    def __init__(self):
        self.children = {}
        self.isWord = False
        
    def addWord(self, word):
        curr = self
        
        for char in word:
            if char not in curr.children:
                curr.children[char] = TrieNode()
            curr = curr.children[char]
            
        curr.isWord = True
        
        
class Solution:
    def findWords(self, board:List[List[str]], words: List[str]) -> List[str]:
        root = TrieNode()
        
        for w in words:
            root.addWord(w)
            
        rows,cols = len(board), len(board[0])
        
        result, visit = set(), set()
        
        def dfs(r,c, node, word):
            
            if r < 0 or c < 0 or r == rows or c == cols or board[r][c] not in node.children or (r,c) in visit:
                return 
            
            visit.add((r,c))
            
            node = node.children[board[r][c]]
            word += board[r][c]
            
            if node.isWord:
                result.add(word)
                
            dfs(r - 1 ,c, node, word)
            dfs(r + 1 ,c, node, word)
            dfs(r ,c - 1, node, word)
            dfs(r ,c + 1, node, word)
            
            
            visit.remove((r,c))
            
        for r in range(rows):
            for c in range(cols):
                dfs(r,c, root, "")
                
        return list(result)