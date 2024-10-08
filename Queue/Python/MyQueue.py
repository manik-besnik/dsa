class Node:
    def __init__(self,val) -> None:
        self.val = val
        self.next = None

class Stack:

    def  __init__(self) -> None:
        self.top = None
        self.size = 0

    def push(self,val):
        node = Node(val)
        if not self.top:
            self.top = node
            self.size +=1
            return
        
        node.next = self.top
        self.top = node
        self.size +=1

    def pop(self):
        self.top = self.top.next
        self.size -=1

    def printStack(self):

        temp = self.top

        while temp:
            print(temp.val)
            temp =temp.next

class MyQueue:

    def __init__(self):
        self.stack1 = Stack()
        self.stack2 = Stack()
        

    def push(self, x: int) -> None:
        self.stack1.push(x)
        

    def pop(self) -> int:

        temp = self.stack1.top
        while temp.next:
            self.stack2.push(temp.val)
            self.stack1.pop()
            temp = temp.next

        self.stack1.pop()


        temp2 = self.stack2.top
        while temp2:
            self.stack1.push(temp2.val)
            self.stack2.pop()
            temp2 = temp2.next

        return temp.val

        

    def peek(self) -> int:
        temp = self.stack1.top
        while temp.next:
            self.stack2.push(temp.val)
            self.stack1.pop()
            temp = temp.next

        temp2 = self.stack2.top
        while temp2:
            self.stack1.push(temp2.val)
            self.stack2.pop()
            temp2 = temp2.next

        return temp.val
        

    def empty(self) -> bool:
        if self.stack1.size > 0:
            return False
        
        return True

