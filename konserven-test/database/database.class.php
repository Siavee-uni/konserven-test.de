<?php
class Database
{
  // DB Params
  private $host = 'localhost';
  private $db_name = 'products';
  private $username = 'root';
  private $password = '';
  private $conn;

  // DB Connect
  public function __construct()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
    }
  }

  function insert($data)
  {
    $columns = implode(", ",array_keys($data));
    $values  = "'" . implode("', '", $data) . "'";
    $sql = "INSERT INTO `konserven2`($columns) VALUES ($values)";

    $this->conn->exec($sql);
    return "New record created successfully";
  }

  function get () {
    $sql = "SELECT name, bio, score, date, image FROM konserven2";
    $sth = $this->conn->prepare($sql);
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }
}
