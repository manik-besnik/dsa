class Solution:
    def fib(self, n: int) -> int:
        if n == 0 : return 0

        f0,f1 = 0,1

        for i in range(n - 1):
            f1,f0 = f1+f0, f1
        return f1

s= Solution()
print(s.fib(4))