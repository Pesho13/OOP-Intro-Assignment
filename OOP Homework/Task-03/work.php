<?php

require_once 'autoload.php';

$task = new Task('programing', 39);

$employee = new Employee('John');

// Make an assignment

$employee->setCurrentTask($task);
echo $employee->showReport(), PHP_EOL;

echo 'Working...', PHP_EOL;

// WORKING

do {
	sleep(1);
	$employee->work();
	echo $employee->showReport(), PHP_EOL;
	$employee->setHoursLeft(8);
	
} while ($task->getWorkingHours()>0);


