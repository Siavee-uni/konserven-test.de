<?php
include_once dirname(__DIR__, 1) . '/env.php';

class Database
{
    // DB Params
    private $host;
    private $db_name;
    private $username;
    private $password;
    protected $conn;

    // Table Properties
    public $id;
    public $name;
    public $brand;
    public $bio;
    public $vegan;
    public $description;
    public $filling;
    public $score;
    public $image;
    public $url;

    public $column;
    public $value;

    // DB Connect
    public function __construct()
    {
        $this->conn = null;
        $this->host = getenv("DB_HOST");
        $this->username = getenv("DB_USERNAME");
        $this->password = getenv("DB_PASSWORD");
        $this->db_name = getenv("DB_NAME");

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
        $values = "'" . implode("', '", $data) . "'";
        $sql = "INSERT INTO `konserven`($columns) VALUES ($values)";

        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
    }

    function readAll()
    {
        $sql = "SELECT * FROM konserven ORDER BY score DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function readSingle($key)
    {
        if ($key == "id") {
            $sql = 'SELECT * FROM `konserven` WHERE id = :id';
            $stmt = $this->conn->prepare($sql);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);
        } else {
            $sql = 'SELECT * FROM `konserven` WHERE url = :url';
            $stmt = $this->conn->prepare($sql);

            $this->url = htmlspecialchars(strip_tags($this->url));

            $stmt->bindParam(':url', $this->url);
        }

        $stmt->execute();
        return $stmt->fetchObject();
    }


    function update()
    {

        $query = "UPDATE konserven
    SET name = :name, brand = :brand, bio = :bio, 
    vegan = :vegan, description = :description, 
    filling = :filling, score = :score
    WHERE
    id = :id";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':brand', $this->brand);
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

        $query = "DELETE FROM `konserven` WHERE `id` = $this->id";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        }
    }

    function search($column)
    {
        $column = htmlspecialchars(strip_tags($column));

        $query = "SELECT * FROM `konserven` WHERE $column = 1 ORDER BY score DESC";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }
    }
}
