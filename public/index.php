<?php
// Entry point for the application
require_once '../app/includes.php';
// Temp
$c = new Core();
$d = new Database();
$q = $d->query('SELECT * FROM users');
print_r($d->fetchArray($q));
$q = $d->query('SELECT * FROM users');
echo "<br>";
print_r($d->fetch($q));
?>