<?php
include_once dirname(__DIR__, 1) . '/models/Product.php';
include_once dirname(__DIR__, 1) . '/config/database.php';
class ProductController
{
    private $db;

    public function __construct() {
        $connection = new Database();
        $this->db = $connection->connect();
    }

    function create()
    {


    }

    public function filterList()
    {
        $product = new Product($this->db);

        if (isset($_GET["search"])) {
            $column = $_GET["search"];
            return $product->search($column);
        } else {
            return $product->readAll();
        }
    }

    function readSingle($key)
    {
        $product = new Product($this->db);

        if ($key == "id") {
            return $product->readSingleID();

        } else {
            $product->url = $_GET["url"];
            return $product->readSingleUrl();
        }
    }


    function update()
    {

    }

    function delete()
    {


    }

    function search()
    {

    }
}