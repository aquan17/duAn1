<?php
class homeModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connectDB();
    }
    function allProduct()
    {
        $sql = "SELECT * FROM products ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function Product()
    {
        $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT 8";
        return $this->conn->query($sql);
    }
    function Products()
    {
        $sql = "SELECT * FROM products ORDER BY product_id";
        return $this->conn->query($sql);
    }

    // homeModel.php
    public function findProductById($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);  // Truyền id vào câu lệnh SQL
        return $stmt->fetch();  // Trả về dữ liệu sản phẩm nếu tìm thấy
        
    }

    function getShirt()
    {
        $sql = "SELECT * FROM products WHERE category_id = 1 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }


    function getJeans()
    {
        $sql = "SELECT * FROM products WHERE category_id = 2 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function getJacket()
    {
        $sql = "SELECT * FROM products WHERE category_id = 3 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getT_shirt()
    {
        $sql = "SELECT * FROM products WHERE category_id = 4 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getHoodie()
    {
        $sql = "SELECT * FROM products WHERE category_id = 5 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function getNewArrivals()
    {
        $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT 4";
        return $this->conn->query($sql)->fetchAll();
    }
    function spCart($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$id]);

        // Ensure product is found
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    function Card()
    {
        // Kiểm tra nếu 'carts' đã tồn tại trong $_SESSION
        if (isset($_SESSION['carts'])) {
            $row = $_SESSION['carts'];
        } else {
            // Nếu không tồn tại, khởi tạo $row như một mảng rỗng
            $row = [];
        }

        require_once 'views/shopping-cart.php';
    }
    public function createOrder($full_name, $address, $city, $phone, $email, $note, $totalPrice)
    {
        $sql = "INSERT INTO orders (full_name, address, city, phone, email, note, total_price, order_date)
                VALUES (:full_name,:address, :city, :phone, :email, :note, :total_price, NOW())";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':total_price', $totalPrice);
        
        $stmt->execute();
    
        // Trả về ID của đơn hàng vừa tạo
        return $this->conn->lastInsertId();
    }
    public function createOrderDetails($order_id, $product_id, $qty, $price)
    {
        $sql = "INSERT INTO order_details (order_id, product_id, quantity, price)
                VALUES (:order_id, :product_id, :quantity, :price)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $qty);
        $stmt->bindParam(':price', $price);
    
        $stmt->execute();
        }
        public function updateUserInfo($id, $name, $email, $phone, $address)
{
    $sql = "UPDATE user SET username = ?, email = ?, phone_number = ?, address = ? WHERE user_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$name, $email, $phone, $address, $id]);

    // Kiểm tra và trả về kết quả
    if ($stmt->rowCount() > 0) {
        return true; // Cập nhật thành công
    }
    return false; // Không có thay đổi
}
public function odhistory() {
    $sql = "SELECT products.title, products.image, order_details.quantity, order_details.price, orders.status, orders.order_date
    FROM products
    INNER JOIN order_details ON products.product_id = order_details.product_id
    INNER JOIN orders ON orders.order_id = order_details.order_id";


    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug: Kiểm tra dữ liệu trả về
    // var_dump($result);
    return $result;
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
