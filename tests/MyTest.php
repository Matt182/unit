<?php
use unit\User;

class BankAccountDBTest extends PHPUnit_Extensions_Database_TestCase
{
    private $pdo;
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->pdo = $this->getPdo();
    }
    /**
    * Custom method to obtain a configured PDO instance.
    *
    * @return \PDO
    */
    protected function getPdo()
    {
        return new PDO('mysql:host=localhost;dbname=unit', 'root');
    }
    /**
    * Returns the test database connection.
    *
    * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
    */
    protected function getConnection()
    {
        return $this->createDefaultDBConnection($this->pdo);
    }
    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/userFixture.xml');
    }

    public function testSelect()
    {
        $user = new User($this->pdo);
        $id = [':id' => 2];
        $row = $user->select($id);
        $this->assertEquals('Ivan', $row['name']);
    }
}
?>
