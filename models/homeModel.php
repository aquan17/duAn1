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
    // models/homeModel.php

public function createOrderDetails($order_id, $product_id, $qty, $price, $order_code)
{
    $sql = "INSERT INTO order_details (order_id, product_id, quantity, price, total_money, order_code)
            VALUES (:order_id, :product_id, :quantity, :price, :total_money, :order_code)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        'order_id' => $order_id,
        'product_id' => $product_id,
        'quantity' => $qty,
        'price' => $price,
        'total_money' => $price * $qty,
        'order_code' => $order_code // Lưu order_code vào bảng order_details
    ]);
}

    // models/homeModel.php

public function createOrder($full_name, $address, $city, $phone, $email, $note, $totalPrice)
{
    // Tạo mã đơn hàng ngẫu nhiên
    $orderCode = $this->generateOrderCode();

    // Lưu thông tin đơn hàng vào bảng orders
    $sql = "INSERT INTO orders (full_name, address, city, phone, email, note, total_price, order_date)
                VALUES (:full_name,:address, :city, :phone, :email, :note, :total_price, NOW())";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        'full_name' => $full_name,
        'address' => $address,
        'city' => $city,
        'phone' => $phone,
        'email' => $email,
        'note' => $note,
        'total_price' => $totalPrice
    ]);

    $orderId = $this->conn->lastInsertId(); // Lấy ID của đơn hàng vừa tạo

    // Sau khi tạo đơn hàng, lưu thông tin chi tiết đơn hàng vào bảng order_details
    return [$orderId, $orderCode]; // Trả về ID của đơn hàng và order_code
}

public function generateOrderCode() {
    return '#' . rand(1000, 9999); // Sinh mã đơn hàng ngẫu nhiên
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
public function odhistory($email) {
    $sql = "SELECT 
                products.title, 
                products.image, 
                order_details.quantity, 
                order_details.price, 
                orders.status, 
                orders.order_date,
                orders.order_id
            FROM 
                products
            INNER JOIN 
                order_details 
                ON products.product_id = order_details.product_id
            INNER JOIN 
                orders 
                ON orders.order_id = order_details.order_id
            WHERE 
                orders.email = :email
            ORDER BY 
                orders.order_date DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getOrderById($order_id) {
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function cancelOrder($order_id) {
    // Cập nhật trạng thái đơn hàng thành "Đã hủy" (status = 3) chỉ khi trạng thái là "Chưa xử lý"
    $sql = "UPDATE orders SET status = 3 WHERE order_id = :order_id AND status NOT IN (1, 2, 4, 5)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    return $stmt->execute();
}



function deleteSpcart($id)
{
    // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
    if (isset($_SESSION['carts'][$id])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['carts'][$id]);

        // Cập nhật lại tổng giá trị giỏ hàng
       

        return true; // Trả về true khi xóa thành công
    }

    return false; // Trả về false nếu sản phẩm không tồn tại trong giỏ hàng
}



public function getProducts($limit, $offset)
{
    $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function getTotalProducts()
{
    $sql = "SELECT COUNT(*) FROM products";
    return $this->conn->query($sql)->fetchColumn();
}
// size
public function getProductSizes($product_id)
{
    $sql = "SELECT * FROM product_sizes WHERE product_id = :product_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}
// màu
public function getProductColors($product_id)
{
    $sql = "SELECT * FROM product_colors WHERE product_id = :product_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}
// Fetch comments for a specific product
public function getProductComments($product_id)
{
    $sql = "SELECT comments.*, user.username 
            FROM comments 
            JOIN user ON comments.user_id = user.user_id 
            WHERE comments.product_id = :product_id AND comments.status = 1 
            ORDER BY comments.created_at DESC";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Add a comment for a product
public function addComment($product_id, $user_id,  $comment_text)
{
    try {
        $sql = "INSERT INTO comments (product_id, user_id, note, status) 
                VALUES (:product_id, :user_id, :note, 3)";  // Thêm giá trị mặc định cho status (chưa xử lý)
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':note', $comment_text, PDO::PARAM_STR);

        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getRelatedProducts($id) {
    $sql = "SELECT * FROM products WHERE product_id != $id LIMIT 2";  // Lấy 2 sản phẩm liên quan không bao gồm sản phẩm hiện tại
    return $this->conn->query($sql);
}

function getRandomProducts($excludeId) {
    $sql = "SELECT * FROM products WHERE category_id IN (1,2, 3,4,5) AND product_id != $excludeId ORDER BY RAND() LIMIT 4";
    // Lấy 3 sản phẩm ngẫu nhiên từ danh mục 2 hoặc 3, không bao gồm sản phẩm hiện tại
    return $this->conn->query($sql)->fetchAll();    


}

}
