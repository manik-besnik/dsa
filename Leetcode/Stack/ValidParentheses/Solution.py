class Solution:

    def isValid(self, s: str) -> bool:
        stack = []

        for str in s:

            if str in '({[':
                stack.append(str)
            else:
                if not stack:
                    return False
                else:
                    pop = stack.pop()
                    if (pop == '(' and str == ')') or  (pop == '{' and str == '}') or  (pop == '[' and str == ']'):
                        continue
                    else: 
                        return False

        if len(stack) == 0:
            return True
        else:
            return False
        
obj = Solution()

print(obj.isValid("()[]{}"))