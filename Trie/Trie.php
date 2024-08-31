<?php

namespace Trie;
class TrieNode
{
    public array $children = [];
    public bool $isEndOfWord = false;

    public function __construct()
    {
        $this->children = [];
        $this->isEndOfWord = false;
    }
}

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }


    public function insert($word): void
    {
        $current = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($current->children[$char])) {
                $current->children[$char] = new TrieNode();
            }

            $current = $current->children[$char];
        }

        $current->isEndOfWord = true;
    }


    public function search($word): bool
    {
        $current = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];

            if (!isset($current->children[$char])) {
                return false;
            }

            $current = $current->children[$char];
        }

        return $current->isEndOfWord;
    }


    public function startsWith($prefix): bool
    {
        $current = $this->root;

        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];

            if (!isset($current->children[$char])) {
                return false;
            }

            $current = $current->children[$char];
        }
        return true;
    }

    // Retrieve all words in the Trie with a given prefix
    public function findWordsWithPrefix($prefix): array
    {
        $current = $this->root;

        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!isset($current->children[$char])) {
                return [];
            }
            $current = $current->children[$char];
        }

        return $this->collectAllWords($current, $prefix);
    }

    // Helper function to collect all words from a given node
    private function collectAllWords($node, $prefix): array
    {
        $words = [];

        if ($node->isEndOfWord) {
            $words[] = $prefix;
        }

        foreach ($node->children as $char => $childNode) {
            $words = array_merge($words, $this->collectAllWords($childNode, $prefix . $char));
        }

        return $words;
    }
}

$trie = new Trie();

$trie->insert('apple');
//$trie->insert('app');
//$trie->insert('ape');

