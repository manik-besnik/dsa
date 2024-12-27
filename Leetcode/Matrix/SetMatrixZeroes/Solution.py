from typing import List

class Solution:
    def setZeroes(self, matrix: List[List[int]]) -> None:
        """
        Do not return anything, modify matrix in-place instead.
        """

        rows,cols = len(matrix),len(matrix[0])

        for i in range(rows):
            for j in range(cols): 
                
                if matrix[i][j] == 0:
                    for k in range(rows):
                        if matrix[k][j] != 0:
                            matrix[k][j] = "*"
                    for l in range(cols):
                        if matrix[i][l] != 0:
                            matrix[i][l] = "*"
                        


        for i in range(rows):
            for j in range(cols):
                if matrix[i][j] == "*":
                    matrix[i][j] = 0
        
        
s = Solution()

matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
s.setZeroes(matrix)

print(matrix)