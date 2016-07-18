<?php
namespace unit;

use PDO;
/**
 *
 */
class User
{
    private $db;

    function __construct(&$db)
    {
        $this->db = $db;
    }

    public function create($values)
    {
        $sql = "insert into users(name, email) values(:name, :email)";
        $sth = $this->db->prepare($sql);
        $sth->execute($values);
        if (!$sth) {
            throw new Exception("Error creating user", 1);
        }
        return $this->db->lastInsertId();
    }

    public function select($id)
    {
        $sql = "select * from users where id=:id";
        $sth = $this->db->prepare($sql);
        $sth->execute($id);
        if (!$sth) {
            throw new Exception("Error selecting user {$id[':id']}", 1);
        }
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
