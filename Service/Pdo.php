<?php
namespace Service;

class Pdo
{
    private $database;

    /**
     * @param \PDO $db
     */
    public function __construct(DatabaseConnexion $database)
    {
        $this->database = $database;
    }

    private function getDb()
    {
        return $this->database;
    }

    public function insert($table, $fields, $data)
    {
        $sql=
            "INSERT INTO
                ".$table."
                (
                ".implode(",", $fields)."
                )
            VALUES
                ".$data."";

        $db = $this->getDb();
        //$requete = $db->prepare($sql);
        //$response = $requete->execute();
        $response = $db->query($sql);
        return $response;
    }

    public function find($table, $fields, $conditions = '', $joins = '')
    {
        $sql =
            "SELECT "
                 .implode(",", $fields).
            " FROM".
            " ".$table.
            " ".$joins.
            " ".$conditions;

                $db = $this->getDb();
                $requete = $db->prepare($sql);
                $requete->execute();

       return $requete->fetchAll();
    }

    public function update($table, $data, $condition)
    {
        $sql =
            "UPDATE ".
                $table.
            " SET ".
                implode(",", $data).
            " ".$condition;

        $db = $this->getDb();
        $response = $db->query($sql);
        return $response;

    }
}
