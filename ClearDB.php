<?php
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

use SQLiteManage\SQLiteConnection;
use SQLiteManage\SQLiteClear;


$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteClear($pdo);
$projectId = $sqlite->ClearDB();

?>
