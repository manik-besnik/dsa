class MyHashSet:

    def __init__(self):
        self.hashSet = set()
        

    def add(self, key: int) -> None:
        self.hashSet.add(key)

    def remove(self, key: int) -> None:
        if key in self.hashSet:
            self.hashSet.remove(key)

    def contains(self, key: int) -> bool:
        if key in self.hashSet:
            return True
        return False
