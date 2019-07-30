<?php

namespace SQLiteManage;
ini_set('display_errors', 'On');
/**
 * PHP SQLite Insert Demo
 */
class SQLiteInsert {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    public function insertAdmin($Admin) {
        $sql = 'INSERT INTO admin(pw) VALUES(:pw)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':pw', $Admin);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $$browserversion
     * @param type $devicetype
     *
     * @param type $devicemodel
     * @param type $devicevendor
     * @return int id of the inserted task
     */
    public function insertUA($browersename, $browserversion,$devicemodel, $devicetype, $devicevendor,$osname,
                             $osversion,$engine,$engineversion,$Pid,$rawUA) {
        $sql = 'INSERT INTO UserAgent( participantID, browsername, browserversion, devicemodel,
 devicetype, devicevendor, osname, osversion, engine, engineversion, rawUA) '
            . 'VALUES(:participantID,:browsername,:browserversion,:devicetype,:devicemodel,:devicevendor,:osname,:osversion,:engine,:engineversion, :rawUA)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':browsername' => $browersename,
            ':browserversion' => $browserversion,
            ':devicemodel' => $devicemodel,
            ':devicetype' => $devicetype,
            ':devicevendor' => $devicevendor,
            ':osname' => $osname,
            ':osversion' => $osversion,
            ':engine' => $engine,
            ':engineversion' => $engineversion,
            ':participantID' => $Pid,
            ':rawUA' => $rawUA
        ]);

        return $this->pdo->lastInsertId();
    }

}