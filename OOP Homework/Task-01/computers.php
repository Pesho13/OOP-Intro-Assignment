<?php

use Computer\Computer;

require_once 'autoload.php';

$laptop = new Computer(2016, 1000, "yes", 1000, 1000, 'Windows 7');
$computer = new Computer(2010, 800, "no", 1000, 900, 'Windows XP');


$laptop->useMemory(900);
echo $laptop->getInfo(), PHP_EOL;


$computer->changeOperationSystem('Windows 10');
echo $computer->getInfo(), PHP_EOL;

