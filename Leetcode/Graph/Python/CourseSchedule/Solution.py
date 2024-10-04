from typing import List

class Node:
    def __init__(self, val = 0, neighbors = None):
        self.val = val
        self.neighbors = neighbors if neighbors is not None else []

class Solution:
    def canFinish(self, numCourses: int, prerequisites: List[List[int]]) -> bool:
        
        preMap = {i:[] for i in range(numCourses)}

        for course, prerequisite in prerequisites:
            preMap[course].append(prerequisite)

        visited = set()

        def dfs(course):
            if course in visited:
                return False
            if preMap[course] == []:
                return True
            visited.add(course)

            for prerequise in preMap[course]:
                if not dfs(prerequise): return False

            visited.remove(course)
            preMap[course] = []
            return True
        for course in range(numCourses):
            if not dfs(course): return False

        return True


s = Solution()
print(s.canFinish(2,[[1,0],[0,1]]))

