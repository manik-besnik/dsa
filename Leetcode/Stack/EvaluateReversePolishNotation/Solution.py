from typing import List

class Solution:
    def evalRPN(self, tokens: List[str]) -> int:
        operators = ['+','-','*','/']
        stack = []

        def calculate(num1, num2 , operator):

            if operator == "+":
                return int(num1) + int(num2)
            if operator == "-":
                return int(num1) - int(num2)
            if operator == "*":
                return int(num1) * int(num2)
            if operator == "/":
                return int(num1) / int(num2)

        for token in tokens:

            if token in operators:
                num2 = stack.pop()
                num1 = stack.pop()
                num = calculate(num1,num2,token)

                stack.append(num)
            else:
                stack.append(token)

        return int(stack[0])
    

s = Solution()

print(s.evalRPN(["10","6","9","3","+","-11","*","/","*","17","+","5","+"]))




        
