<?php
require_once "models/Category.php";

class CategoryController {
    public function list() {
        $categories = (new Category())->all();
        view('category/list', ['categories' => $categories]);
    }

    public function delete() {
        $id = $_GET['id'];
        (new Category())->delete($id);
        header("Location:index.php?ctl=category-list");
        die;
    }

    public function add() {
        view('category/add');
    }

    public function store() {
        $data = $_POST;
        (new Category())->insert($data);
        header("Location: index.php?ctl=category-list");
        die;
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Lấy dữ liệu từ form
            $data = $_POST;
    
            // Thêm 'id' từ URL vào mảng $data
            if (isset($_GET['id'])) {
                $data['id'] = $_GET['id'];  // Thêm id vào mảng dữ liệu
            }
    
            // Gọi phương thức update với mảng dữ liệu đầy đủ
            (new Category())->update($data);
    
            // Sau khi cập nhật, chuyển hướng về danh sách danh mục
            header("Location: index.php?ctl=category-list");
            die;
        }
    
        // Nếu là phương thức GET, lấy thông tin danh mục cần chỉnh sửa
        $id = $_GET['id'];
        $category = (new Category())->find_one($id);
    
        // Hiển thị form chỉnh sửa
        view('category/edit', ['category' => $category]);
    }
    
}
