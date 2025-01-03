from typing import List

class Solution:
    def equalPairs(self, grid: List[List[int]]) -> int:
        rows, cols = len(grid),len(grid[0])

        result = 0

        if rows != cols:
            return 0
        
        gridCols = []

        for i in range(cols):
            col = []
            for j in range(rows):
                col.append(grid[j][i])
                
            gridCols.append(col)
            col = []
            
        print(gridCols)

        

        for i in range(rows):
            for j in range(cols):
                if grid[i] == gridCols[j]:
                    result += 1
        
        return result
    
    
    # def equalPairs(self, grid: List[List[int]]) -> int:
    #     row_counts = defaultdict(int)
    #     count = 0
    #     # Loop through each row in the grid and store the frequency of each unique row.
    #     for row in grid :
    #         row_counts[tuple(row)] +=1
    #     # Loop through each column in the grid (by transposing the grid using zip).
    #     for columns in zip(*grid) :
    #     # Count how many times each column appears in the row_counts.
    #         count += row_counts[columns]
    #     return count   


s = Solution()

print(s.equalPairs([[3,1,2,2],
                    [1,4,4,4],
                    [2,4,2,2],
                    [2,5,2,2]
                    ]))