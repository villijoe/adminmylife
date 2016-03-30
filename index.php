<?php

error_reporting(E_ALL);

$conn = new PDO("mysql:host=localhost;dbname=adminmylife", "root", "") or die("fuck");

define('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__).DIRSEP.'..'.DIRSEP).DIRSEP;

define('site_path', $site_path);
if ( isset($_GET['route']) && $_GET['route'] == 'books' ) { require_once "books.php"; }
if ( isset($_GET['route']) && $_GET['route'] == 'deals' ) { require_once "deals.php"; }
if ( isset($_GET['route']) && $_GET['route'] == 'cook' ) { require_once "cook.php"; }
if ( isset($_GET['route']) && $_GET['route'] == 'games' ) { require_once "games.php"; }
else { require_once "main.php"; }
?>