<?php
$day = $_GET['day'];
$member = $_GET['member'];
$newstatus = $_GET['newstatus'];

$xml = simplexml_load_file("availability.xml") or die("Unable to load XML");

$select = $xml->xpath("//day[@date='". $day ."']/member[@id='". $member ."']");

$select[0]->attributes()->free = $newstatus;

var_dump($xml->asXML());

file_put_contents("availability.xml", $xml->asXML());
?>