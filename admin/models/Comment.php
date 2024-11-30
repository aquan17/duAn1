<?php
class Comment {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy tất cả bình luận (chỉ hiển thị những bình luận có status = 1)
    public function all() {
        $sql = "SELECT comment_id, note, user_id, product_id, created_at, status FROM comments";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Ẩn bình luận (cập nhật status thành 0)
    public function hide($id) {
        $sql = "UPDATE comments SET status = 0 WHERE comment_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function updateStatus($id, $status) {
        $sql = "UPDATE comments SET status = :status WHERE comment_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $status, 'id' => $id]);
    }
    
}
