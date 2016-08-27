<?php

require_once 'autoload.php';

$gsm1 = new GSM('nokia');
$gsm2 = new GSM('LG');


$gsm1->insertSimCard('0899 110011');
$gsm2->insertSimCard('0888 22 33 44');

$gsm1->call($gsm2, 20);


echo $gsm1->printInfoForTheLastOutgoingCall(), PHP_EOL;
echo $gsm1->printInfoForTheLastIncomingCall(), PHP_EOL;

echo  PHP_EOL;

echo $gsm2->printInfoForTheLastOutgoingCall(), PHP_EOL;
echo $gsm2->printInfoForTheLastIncomingCall(), PHP_EOL;
