class StockSpanner:

    def __init__(self):
        self.stack = []
        

    def next(self, price: int) -> int:
        result = 1
        
        while self.stack and self.stack[-1][0] <= price:
            hp, hs = self.stack.pop()
            result += hs
        self.stack.append((price,result))
        
        return result
        


# Your StockSpanner object will be instantiated and called as such:
# obj = StockSpanner()
# param_1 = obj.next(price)