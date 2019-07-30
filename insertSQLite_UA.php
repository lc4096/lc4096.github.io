<?php
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

use SQLiteManage\SQLiteConnection;
use SQLiteManage\SQLiteInsert;

$browersename = $_POST["browsername"];
$browserversion = $_POST["browserversion"];
$devicetype = $_POST["devicetype"];
$devicemodel = $_POST["devicemodel"];
$devicevendor = $_POST["devicevendor"];
$osname = $_POST["osname"];
$osversion = $_POST["osversion"];
$engine = $_POST["engine"];
$engineversion = $_POST["engineversion"];
$Pid = $_POST["Pid"];
$rawUA = $_POST["rawUA"];

$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);

// insert a new project
$projectId = $sqlite->insertUA($browersename, $browserversion, $devicetype, $devicemodel, $devicevendor,$osname,
    $osversion,$engine,$engineversion,$Pid,$rawUA);

?>

