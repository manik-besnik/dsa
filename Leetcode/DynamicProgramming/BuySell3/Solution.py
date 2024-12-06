from typing import List

class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        if len(prices)<2:
            return 0
        fb = float('inf')
        sb = float('inf')
        fs = 0
        ss = 0
        for price in prices:
            fb=min(fb,price)
            fs=max(fs,price-fb)
            sb=min(sb,price-fs)
            ss=max(ss,price-sb)
        return ss