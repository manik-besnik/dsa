from typing import List

class Solution:
    def coinChange(self, coins: List[int], amount: int) -> int:

        coins.sort() 
        
        if len(coins) == 1 and coins[0] == amount:

            return 1
        
        if amount == 0:
            return 0

        requiredAmount = amount
        coinCount = 0


        i = len(coins) - 1

        while  i >= 0:

            if requiredAmount > coins[i]:
                requiredAmount -= coins[i]
                coinCount += 1

                continue
   
            elif requiredAmount == coins[i]:
                return coinCount + 1
            i -= 1

        
        return -1
        

s = Solution()

print(s.coinChange([2],1))