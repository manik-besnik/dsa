<?php

class Solution
{
    /**
     * @param String $path
     * @return String
     */
    public function simplifyPath(string $path): string
    {
        $paths = [];

        $str = '';

        $result = '';

        for ($i = 0; $i < strlen($path); $i++) {

            if ($path[$i] === '/') {
                if ($str === '..') {
                    array_pop($paths);
                } else {
                    if (strlen($str) > 0 && $str !== '.') {
                        $paths[] = $str;
                    }
                }

                $str = '';

            } else {

                $str .= $path[$i];
            }


        }


        if (strlen($str) > 0 && $str !== '.') {

            if ($str === '..') {
                array_pop($paths);
            } else {

                $paths[] = $str;
            }

        }

        if (count($paths) === 0) {
            return '/';
        }

        foreach ($paths as $p) {
            $result .= '/' . $p;
        }

        return $result;

    }
}

$result = new Solution();

var_dump($result->simplifyPath('/home/user/Documents/../Pictures'));