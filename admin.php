<?php
ini_set('display_errors', 'On');
require 'vendor/autoload.php';
use SQLiteManage\SQLiteConnection;
use SQLiteManage\SQLiteCreateTable;

$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());

if ($sqlite->nbAdmin() == 0){
    $sqlite->defaultAdmin();
}

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

    if ($sqlite->IsAdmin($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])[0] != 0){
        include('views/admin.html');
    }
    else{
        header('WWW-Authenticate: Basic realm="Protected area"');
        header('HTTP/1.0 401 Unauthorized');
        die('Login failed!');
    }
}
else{
    header('WWW-Authenticate: Basic realm="Protected area"');
    header('HTTP/1.0 401 Unauthorized');
    die('Login failed!');
}

function ArrayToTab($tab){
    $sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());
    $nb = $sqlite->nbRecord();
    $str = '<table class="w3-table-all w3-hoverable">';
    $str=$str.'<tr ><th>'."Participant ID".'</th><th>'."Browser Name".'</th><th>'."Browser Version".'</th><th>'.
        "Device Model".'</th><th>'."Device Type".'</th><th>'."Device Vendor".'</th><th>'."Os Name".'</th><th>'.
        "Os Version".'</th><th>'."Engine".'</th><th>'."Engine Version".'</th><th>'."raw UA".'</th></tr>';
    for ($i = 0; $i < $nb; $i++){
        $str= $str."<tr class=\"border_bottom\">";
        for ($j = 0; $j < 11; $j++){
            $str=$str.'<td>'.$tab[$j][$i].'</td>';
        }
        $str=$str.'</tr>';
    }
    $str=$str.'</table>';
    return $str;
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function clearDB() {
        $.post('ClearDB.php'  ,      function (data, status) {
            console.log(data + status);
        });
        setTimeout(function(){
            document.location.reload();
        }, 200);

    }

    $(document).ready(function() {
        $("#source_form").submit(function(event) {
            event.preventDefault();
                $.post("changeAdminSQLite.php",
                    {
                        pw: document.getElementById("pw").value
                    },
                    function (data, status) {
                        console.log(data.toString() + status.toString());
                    });
            setTimeout(function(){
                document.location.reload();
            }, 200);
            });
    });

</script>
