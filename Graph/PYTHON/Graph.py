class Graph:

    def __init__(self):
        self.graph = {}


    def add_edge(self,u,v):
        
        if u not in self.graph:
            self.graph[u]=[]

        if v not in self.graph:
            self.graph[v]=[]

        self.graph[u].append(v)
        self.graph[v].append(u)


    # Breadth-First Search (BFS)

    def bfs(self, start):
        visited = set()
        queue= [start]
        visited.add(start)

        while queue:

            node = queue.pop(0)
            print(node)

            for neighbor  in self.graph[node]:
                if neighbor not in visited:
                    visited.add(neighbor)
                    queue.append(neighbor)



    # depth-First Search (DFS)
    def dfs(self,start):
        visited = set()
        
        def dfs_recursive(node):
            visited.add(node)
            print(node)
            for neighbor in self.graph[node]:
                if neighbor not in visited:
                    dfs_recursive(neighbor)
        dfs_recursive(start)
    

    # Cycle Detection
    def has_cycle(self):
        visited = set()

        def dfs_cycle(node, parent):
            visited.add(node)
            for neighbor in self.graph[node]:
                if neighbor not in visited:
                    if dfs_cycle(neighbor, node):
                        return True
                elif neighbor != parent:
                    return True
            return False
                
        for vertex in self.graph:
            if vertex not in visited:
                if dfs_cycle(vertex, None):
                    return True

        return False




graph = Graph()

graph.add_edge(0,1)
graph.add_edge(1,2)
graph.add_edge(1,3)
graph.add_edge(1,4)
graph.add_edge(2,3)
graph.add_edge(2,4)
graph.add_edge(3,4)


g2 = Graph()

g2.add_edge(1,2)
g2.add_edge(2,3)
g2.add_edge(4,5)
g2.add_edge(5,6)
g2.add_edge(8,9)

# graph.bfs(3)
print(graph.has_cycle())
print(g2.has_cycle())
# print(graph.bfs(3))