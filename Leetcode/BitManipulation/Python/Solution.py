class Solution:
    def addBinary(self, a: str, b: str) -> str:
       return bin(int(a,2) + int(b,2))[2::]
    
object = Solution()

print(object.addBinary('11','1'))