<?php
namespace SQLiteManage;

/**
 * SQLite Create Table Demo
 */
class SQLiteCreateTable {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the SQLite database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * create tables
     */
    public function createTables() {
        $commands = ['CREATE TABLE IF NOT EXISTS UserAgent ( participantID varchar(20) not null,
 browsername varchar(20), browserversion varchar(20), devicemodel varchar(100),
 devicetype varchar(20), devicevendor varchar(20), osname varchar(20), osversion varchar(20), engine varchar(20), engineversion varchar(20), rawUA varchar(500));',
            'CREATE TABLE IF NOT EXISTS admin ( user varchar(40),pw varchar(40))'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

    public function defaultAdmin() {
        $commands = ["INSERT INTO admin (user,pw) VALUES ('LERSSE','LERSSE')"];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

    /**
     * get the table list in the database
     */
    public function getTableList() {

        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }

    public function IsAdmin($user,$pw) {
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $stmt = $this->pdo->query("SELECT COUNT (user)
                                   FROM admin
                                   WHERE user = '".$user."' AND pw = '".$pw."'");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['COUNT (user)'];
        }

        return $tables;
    }

    public function getAllUA() {
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $stmt = $this->pdo->query("SELECT *
                                   FROM UserAgent");
        $id = [];
        $bn = [];
        $bv = [];
        $dm = [];
        $dt = [];
        $dv = [];
        $on = [];
        $ov = [];
        $en = [];
        $ev = [];
        $raw = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $id[] = $row['participantID'];
            $bn[] = $row['browsername'];
            $bv[] = $row['browserversion'];
            $dm[] = $row['devicemodel'];
            $dt[] = $row['devicetype'];
            $dv[] = $row['devicevendor'];
            $on[] = $row['osname'];
            $ov[] = $row['osversion'];
            $en[] = $row['engine'];
            $ev[] = $row['engineversion'];
            $raw[] = $row['rawUA'];

        }

        return [$id,$bn,$bv,$dm,$dt,$dv,$on,$ov,$en,$ev,$raw];
    }

    public function nbRecord(){
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $stmt = $this->pdo->query("SELECT COUNT (participantID)
                                   FROM UserAgent");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['COUNT (participantID)'];
        }

        return $tables[0];
    }

    public function nbAdmin(){
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $stmt = $this->pdo->query("SELECT COUNT (user)
                                   FROM admin");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['COUNT (user)'];
        }

        return $tables[0];
    }


}