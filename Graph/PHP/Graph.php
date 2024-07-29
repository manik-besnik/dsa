<?php

class Graph
{
    public array $graph = [];
    public array $visited = [];


    public function insert(int $a, int $b): void
    {
        if (!isset($this->visited[$a])) {
            $this->visited[$a] = false;
        }

        if (!isset($this->visited[$b])) {
            $this->visited[$b] = false;
        }

        if (isset($this->graph[$a])) {
            $this->graph[$a][] = $b;
        }
        if (!isset($this->graph[$a])) {
            $this->graph[$a] = [$b];
        }
        if (isset($this->graph[$b])) {
            $this->graph[$b][] = $a;
        }
        if (!isset($this->graph[$b])) {
            $this->graph[$b] = [$a];
        }
    }

    /**
     * Breath First Search(BFS)
     */
    public function bfs($start): void
    {
        $this->visited[$start] = true;

        $queue = [$start];

        while (count($queue) > 0) {

            echo $queue[0] . "\n";

            foreach ($this->graph[$queue[0]] as $node) {

                if (isset($this->visited[$node]) && !$this->visited[$node]) {
                    $this->visited[$node] = true;
                    $queue[] = $node;
                }

            }

            array_shift($queue);

        }
    }
}


$graph = new Graph();

$graph->insert(10, 15);
$graph->insert(10, 20);
$graph->insert(10, 25);
$graph->insert(10, 30);
$graph->insert(15, 20);
$graph->insert(15, 25);
$graph->insert(40, 50);


//$graph->bfs(10);
//var_dump($graph->visited);
$count = 0;
foreach ($graph->visited as $key => $visited) {

    if (!$graph->visited[$key]) {

        $graph->bfs($key);

        $count++;

    }

}

echo $count;