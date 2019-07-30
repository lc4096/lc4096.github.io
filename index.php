<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="views/style.css">
    <meta charset="UTF-8">
    <title>Smart Lock Survey</title>
</head>
<body>
<div class="centre">
<!--    onsubmit="record(this)"-->
<form  id="source_form">
    Participant ID: <input type="text" id="Pid" required>
    <input type="submit" value="Send">
</form>
</div>
<!--<div id="resultInsert">&nbsp;</div>-->
<!--<div id="ua">&nbsp;</div>-->
</body>
</html>


<?php
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

use SQLiteManage\SQLiteConnection;
use SQLiteManage\SQLiteCreateTable;

$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());
// create new tables
$sqlite->createTables();

$pdo = (new SQLiteConnection())->connect();
//if ($pdo != null)
//    echo 'Connected to the SQLite database successfully!';
//else
//    echo 'Whoops, could not connect to the SQLite database!';

?>

<script type="text/javascript" src="scripts/appleModel.js"></script>
<script type="text/javascript" src="scripts/ua-parser.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="scripts/indexScript.js" type="text/javascript"></script>
