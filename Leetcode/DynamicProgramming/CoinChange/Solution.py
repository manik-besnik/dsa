from typing import List

class Solution:
    def coinChange(self, coins: List[int], amount: int) -> int:

        coins.sort() 
        
        dp = [0] * (amount + 1)

        for i in range(1, amount + 1):
            min_val = float('inf')

            for coin in coins:
                diff = i - coin

                if diff < 0:
                    break
                min_val = min(min_val, dp[diff] + 1)

            dp[i] = min_val
        if(dp[amount] < float('inf')):
            return dp[amount]
        else:
            return - 1
        

s = Solution()

print(s.coinChange([2],1))