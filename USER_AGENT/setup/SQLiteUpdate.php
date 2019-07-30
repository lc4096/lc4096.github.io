<?php

namespace SQLiteManage;
ini_set('display_errors', 'On');
/**
 * PHP SQLite Insert Demo
 */
class SQLiteUpdate {

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
    public function updatePW($pw) {
        $sql = 'UPDATE admin SET pw = :pw';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':pw', $pw);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

}