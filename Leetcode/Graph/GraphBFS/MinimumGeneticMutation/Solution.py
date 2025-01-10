from typing import List

from collections import deque

class Solution:
    def minMutation(self, startGene: str, endGene: str, bank: List[str]) -> int:
        
        bankSet = set(bank)
        
        if endGene not in bankSet:
            return - 1
        
        q = deque([startGene])
        
        mutations = 0
        
        while q:
            for _ in range(len(q)):
                gene = q.popleft()
            
                if gene == endGene:
                    return mutations

                for i in range(len(gene)):
                    for c in "ACGT":
                        mutated = gene[:i] + c + gene[i+1:]
                        if mutated in bankSet:
                            q.append(mutated)
                            bankSet.remove(mutated)
            mutations += 1
                
                
        return - 1