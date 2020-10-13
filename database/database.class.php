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

    $sth = $this->conn->prepare($sql);
    $sth->execute();
    return "New record created successfully";
  }

  function read(string $columns, string $table)
  {

    $sql = "SELECT $columns FROM $table ORDER BY
    score DESC";
    $sth = $this->conn->prepare($sql);
    $sth->execute();

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  function update(array $columns, string $table)
  {

    $query = 'UPDATE' . $table . '
    SET name = :name, bio = :bio, 
    vega = :vegan, description = :description, 
    filling = :filling, score = :score
    WHERE
    id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->bio);
    $stmt->bindParam(':name', $this->vegan);
    $stmt->bindParam(':id', $this->description);
    $stmt->bindParam(':name', $this->filling);
    $stmt->bindParam(':id', $this->score);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
  }
}
