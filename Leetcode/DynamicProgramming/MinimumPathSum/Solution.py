from typing import List
class Solution:
    def minPathSum(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        prev_row = [float("inf")] * COLS
        prev_row[COLS - 1] = 0  # Initialize
        
        for r in range(ROWS - 1, -1, -1):
            curr_row = [float("inf")] * COLS
            for c in range(COLS - 1, -1, -1):
                curr_row[c] = grid[r][c] + min(prev_row[c], curr_row[c + 1] if c + 1 < COLS else float("inf"))
            prev_row = curr_row
        
        return prev_row[0]
    


# class Solution:
#     def minPathSum(self, grid: List[List[int]]) -> int:
#         ROWS, COLS = len(grid), len(grid[0])
#         result = [[float("inf")] * (COLS + 1) for _ in range(ROWS + 1)]
#         result[ROWS - 1][COLS] = 0  # Fix initialization
        
#         for r in range(ROWS - 1, -1, -1):
#             for c in range(COLS - 1, -1, -1):
#                 result[r][c] = grid[r][c] + min(result[r + 1][c], result[r][c + 1])
        
#         return result[0][0]
