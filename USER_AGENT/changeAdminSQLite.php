<?php
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

use SQLiteManage\SQLiteConnection;
use SQLiteManage\SQLiteUpdate;


$pw = $_POST["pw"];

$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteUpdate($pdo);

// insert a new project
$projectId = $sqlite->updatePW($pw);
?>
<script type="text/javascript">
document.location.href="admin.php";
</script>
