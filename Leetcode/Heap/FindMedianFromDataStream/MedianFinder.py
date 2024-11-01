import heapq

class MedianFinder:
    def __init__(self):
        
        self.low = []
        
        self.high = []

    def add_num(self, num: int) -> None:
        
        heapq.heappush(self.low, -num)
        

        if self.low and self.high and (-self.low[0] > self.high[0]):
            val = -heapq.heappop(self.low)
            heapq.heappush(self.high, val)
        

        if len(self.low) > len(self.high) + 1:
            val = -heapq.heappop(self.low)
            heapq.heappush(self.high, val)
        elif len(self.high) > len(self.low):
            val = heapq.heappop(self.high)
            heapq.heappush(self.low, -val)

    def find_median(self) -> float:

        if len(self.low) == len(self.high):
            return (-self.low[0] + self.high[0]) / 2.0

        return -self.low[0]
