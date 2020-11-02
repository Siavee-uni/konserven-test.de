<?php
include_once dirname(__DIR__, 1) . '/models/Product.php';
include_once dirname(__DIR__, 1) . '/config/database.php';
class ProductController
{
    private $db;
    /**
     * @var mixed
     */

    public function __construct() {
        $connection = new Database();
        $this->db = $connection->connect();
    }

    function create()
    {
        $data = [
            'name' => $_POST["name"],
            'bio' => $_POST["bio"],
            'brand' => $_POST["brand"],
            'vegan' => $_POST["vegan"],
            'description' => $_POST["description"],
            'filling' => $_POST["filling"],
            'score' => $_POST["score"],
            'image' => basename($_FILES["image"]["name"]),
            'url' => $_POST["name"] . "-" . $_POST["brand"]
        ];

        $product = new Product($this->db);
        if( $product->create($data)) {
            // file upload
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            /*  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
             echo $_FILES["image"]["name"] = basename($_FILES["image"]["name"],".".$imageFileType) . $timeStamp . "." . $imageFileType; */
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            return true;
        } else {
            return false;
        }
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
            if (!isset($_POST)) {
                $product->id = $_GET["id"];
            } else {
                $product->id = $_POST["id"];
            }
            return $product->readSingleID();

        } else {
            $product->url = $_GET["url"];
            return $product->readSingleUrl();
        }
    }


    function update()
    {
        $product = new Product($this->db);

        $product->name = $_POST["name"];
        $product->bio = $_POST["bio"];
        $product->vegan = $_POST["vegan"];
        $product->description = $_POST["description"];
        $product->filling = $_POST["filling"];
        $product->score = $_POST["score"];
        $product->id = $_POST["id"];
        $product->brand = $_POST["brand"];

        if ($product->update()) {
            // file upload
            /* $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); */

            /* move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); */
            return true;
        } else {
            return false;
        }
    }

    function delete()
    {

        $product = new Product($this->db);
        $product->id = $_POST["id"];
        $fileName = $product->readSingleID()->image;

        if ($product->delete()) {
            // delete File from server
            $filePath = "../uploads/" . $fileName;
            unlink($filePath);
            return true;
        } else {
            return false;
        }
    }
}