#!/usr/bin/env php
<?php
// installed via composer?
if (file_exists($a = realpath(__DIR__.'/../../../autoload.php'))) {
    require_once $a;
} else {
    require_once realpath(__DIR__.'/../vendor/autoload.php');
}

$maze = new \PHPMaze\PHPMaze();
$data = $maze->generate();
var_dump($data);
