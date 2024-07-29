class Graph {
    constructor() {
        this.graph = {}
    }

    insert(a, b) {
        if (this.graph[a]) {
            this.graph[a].push(b)
        }
        if (this.graph[b]) {
            this.graph[b].push(a)
        }
        if (!this.graph[a]) {
            this.graph[a] = [b]
        }
        if (!this.graph[b]) {
            this.graph[b] = [a];
        }
    }

}

const myGraph = new Graph();

myGraph.insert(10, 20)
myGraph.insert(10, 15)
myGraph.insert(10, 25)
myGraph.insert(15, 25)

console.log(myGraph.graph)