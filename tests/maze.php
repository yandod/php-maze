#!/usr/bin/env php
<?php
// installed via composer?
if (file_exists($a = realpath(__DIR__.'/../../../autoload.php'))) {
    require_once $a;
} else {
    require_once realpath(__DIR__.'/../vendor/autoload.php');
}

$opts = getopt('', ['size:']);

$maze = new \PHPMaze\PHPMaze(0, $opts['size']);
$data = $maze->generate();
echo $maze->toString($data);
