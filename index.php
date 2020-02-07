<?php
require_once 'Events.php';
require_once 'People.php';
require_once 'Agenda.php';

echo '<h1>' . 'Events::findOne()->allPeoples();' . '</h1>';

//$allPEvents=Events::findOne([])->allPeople([]);
//
//echo '<pre>';
//var_dump($allPEvents);
//echo '</pre>';

echo '<h1>' . 'Events::findAllByDate(\'2020-03-06\');' . '</h1>';

$date=Events::findAllByDate('2020-02-07');

echo '<pre>';
var_dump($date);
echo '</pre>';