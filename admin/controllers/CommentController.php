<?php
class CommentController {

// Hiển thị danh sách bình luận
public function list() {
    $comments = (new Comment())->all(); // Lấy tất cả bình luận
    view('comment/list', ['comments' => $comments]); // Truyền dữ liệu vào view
}

// Ẩn bình luận
public function showComment() {
    $id = $_GET['id'];
    $commentModel = new Comment();
    $commentModel->updateStatus($id, 1); // 1 = Hiển thị
    header("Location: index.php?ctl=comment-list");
}
public function hideComment() {
    $id = $_GET['id'];
    $commentModel = new Comment();
    $commentModel->updateStatus($id, 0); // 0 = Đã ẩn
    header("Location: index.php?ctl=comment-list");
}

}

