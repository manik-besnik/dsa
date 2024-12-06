from typing import List

class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        min_first_buy = float('inf')
        max_first_profit = 0
        min_second_buy = float('inf')
        max_second_profit = 0

        for price in prices:
            if price < min_first_buy:
                min_first_buy = price
            
            if price - min_first_buy > max_first_profit:
                max_first_profit = price - min_first_buy

            if price - max_first_profit < min_second_buy:
                min_second_buy = price - max_first_profit

            if price - min_second_buy > max_second_profit:
                max_second_profit = price - min_second_buy

        return max_second_profit

        