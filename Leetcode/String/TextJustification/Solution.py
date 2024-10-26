from typing import List

class Solution:
    def fullJustify(self, words: List[str], maxWidth: int) -> List[str]:
        result = []
        currentLine, length = [], 0
        i = 0

        while i < len(words):
            if length + len(currentLine) + len(words[i]) > maxWidth:
                
                extra_space = maxWidth - length
                if len(currentLine) == 1:  
                    result.append(currentLine[0] + ' ' * extra_space)
                else:
                    spaces = extra_space // (len(currentLine) - 1)
                    reminder_space = extra_space % (len(currentLine) - 1)

                    for j in range(len(currentLine) - 1):
                        currentLine[j] += " " * spaces
                        if reminder_space > 0:
                            currentLine[j] += " "
                            reminder_space -= 1
                    result.append("".join(currentLine))

                currentLine, length = [], 0

            currentLine.append(words[i])
            length += len(words[i])
            i += 1


        last_line = " ".join(currentLine)
        print(last_line)
        result.append(last_line + " " * (maxWidth - len(last_line)))

        return result
    
s = Solution()

print(s.fullJustify(["What","must","be","acknowledgment","shall","be"],16))
