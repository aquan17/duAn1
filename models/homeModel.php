<?php
class homeModel{
    public $conn;
    function __construct(){
        $this->conn = connectDB();
    }
    function allProduct() {
        $sql = "SELECT * FROM products ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function Product() {
        $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT 8";
        return $this->conn->query($sql);
    }
    function Products() {
        $sql = "SELECT * FROM products ORDER BY product_id";
        return $this->conn->query($sql);
    }

    function findProductById($id){
        $sql = "SELECT * FROM products WHERE product_id = $id";
        return $this->conn->query($sql)->fetch();
    }
    function getShirt() {
        $sql = "SELECT * FROM products WHERE category_id = 1 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }


    function getJeans() {
        $sql = "SELECT * FROM products WHERE category_id = 2 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function getJacket() {
        $sql = "SELECT * FROM products WHERE category_id = 3 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getT_shirt() {
        $sql = "SELECT * FROM products WHERE category_id = 4 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getHoodie() {
        $sql = "SELECT * FROM products WHERE category_id = 5 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getNewArrivals() {
        $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT 4";
        return $this->conn->query($sql)->fetchAll();
    }
    function spCart($id){
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$id]);
    
        // Ensure product is found
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    function Card() {
        // Kiểm tra nếu 'carts' đã tồn tại trong $_SESSION
        if (isset($_SESSION['carts'])) {
            $row = $_SESSION['carts'];
        } else {
            // Nếu không tồn tại, khởi tạo $row như một mảng rỗng
            $row = [];
        }
    
        require_once 'views/shopping-cart.php';
    }
    
    

    // Fetch limited products for "Hot Sales" (random selection)
    // function getHotSales() {
    //     $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4";
    //     return $this->conn->query($sql)->fetchAll();
    // }
    // function getBestSellers() {
    //     // Example query: Get top-selling products, or just a predefined list by product IDs
    //     $sql = "SELECT * FROM products WHERE product_id IN (1, 2, 3, 4, 5)"; // Example, use actual top-selling logic or static IDs
    //     return $this->conn->query($sql)->fetchAll();
    // }
}
?>
