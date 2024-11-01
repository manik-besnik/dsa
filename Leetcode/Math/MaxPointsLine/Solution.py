import collections
from typing import List

class Solution:
    def maxPoints(self, points: List[List[int]]) -> int:

        result = 1

        for i in range(len(points)):
            p1 = points[i]
            count = collections.defaultdict(int)
            for j in range(i+1, len(points)):
                p2 = points[j]

                if p1 == p2:
                    slove = float('inf')
                else:
                    slove = (p2[1] - p1[1]) / (p2[0] - p1[0])

                count[slove] +=1
                result = max(result, count[slove] + 1)

        return result