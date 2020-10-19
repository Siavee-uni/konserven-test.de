<?php
class Database
{
  // DB Params
  private $host = 'localhost';
  private $db_name = 'products';
  private $username = 'root';
  private $password = '';
  protected $conn;

  // Table Properties
  public $id;
  public $name;
  public $bio;
  public $vegan;
  public $description;
  public $filling;
  public $score;

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

  function create(array $data)
  {
    $columns = implode(", ", array_keys($data));
    $values  = "'" . implode("', '", $data) . "'";
    $sql = "INSERT INTO `konserven`($columns) VALUES ($values)";

    $stmt = $this->conn->prepare($sql);
    if ($stmt->execute()) {
      return true;
    }
  }

  function read(string $columns, string $table)
  {

    $sql = "SELECT $columns FROM $table ORDER BY
    score DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  function readSingle(string $columns, string $table, $id)
  {

    $sql = "SELECT $columns FROM $table WHERE id = $id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchObject();
    return $result;
  }


  function update()
  {

    $query = 'UPDATE konserven
    SET name = :name, bio = :bio, 
    vegan = :vegan, description = :description, 
    filling = :filling, score = :score
    WHERE
    id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':bio', $this->bio);
    $stmt->bindParam(':vegan', $this->vegan);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':filling', $this->filling);
    $stmt->bindParam(':score', $this->score);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
  }

  function delete()
  {

    $query = "DELETE FROM `konserven` WHERE `id` = $this->id" ;
    $stmt = $this->conn->prepare($query);
    
    if ($stmt->execute()) {
      return true;
    }
  }
}
