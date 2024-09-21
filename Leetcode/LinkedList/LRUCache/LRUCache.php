<?php

namespace LRUCache;

class Node
{
    public function __construct(
        public int       $key,
        public int       $val,
        public Node|null $prev = null,
        public Node|null $next = null,
    )
    {
    }
}

class LRUCache
{
    private Node|null $head = null;
    private Node|null $tail = null;
    private array $cache = [];
    private int $capacity;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->cache = [];
        $this->head = new Node(-1, -1);
        $this->tail = new Node(-1, -1);

        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    public function get(int $key): int
    {
        if (!isset($this->cache[$key])) {
            return -1;
        }

        $listNode = $this->cache[$key];

        $this->remove($listNode);
        $this->add($listNode);

        return $listNode->val;
    }

    public function put(int $key, int $val): void
    {
        if (isset($this->cache[$key])) {
            $this->remove($this->cache[$key]);
        }

        $listNode = new Node($key, $val);

        $this->cache[$key] = $listNode;

        $this->add($listNode);

        if (count($this->cache) > $this->capacity) {
            $deletableNode = $this->head->next;

            $this->remove($deletableNode);

            unset($this->cache[$deletableNode->key]);
        }
    }

    private function add(Node $listNode): void
    {
        $previousEnd = $this->tail->prev;
        $previousEnd->next = $listNode;
        $listNode->prev = $previousEnd;
        $listNode->next = $this->tail;
        $this->tail->prev = $listNode;
    }

    private function remove(Node $listNode): void
    {
        $listNode->prev->next = $listNode->next;
        $listNode->next->prev = $listNode->prev;
    }
}

$obj = new  LRUCache(5);
$obj->put(8, 10);
$ret_1 = $obj->get(8);