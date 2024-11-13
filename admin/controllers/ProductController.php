<?php
require_once "models/Product.php";

class ProductController {
    public function list() {
        $products = (new Product())->all();
        
        view('product/list', ['products' => $products]);
    }

    public function delete() {
        $id = $_GET['id'];
        (new Product())->delete($id);
        header("Location: index.php?ctl=product-list");
        die;
    }
    public function add() {
        // Lấy danh sách các danh mục
        $categories = (new Category())->all();
        // Truyền danh mục vào view 'product/add'
        view('product/add', ['categories' => $categories]);
    }
    // public function add() {
    //     view('product/add');
    // }

    public function store() {
        $data = $_POST;
        $image = "";
        if ($_FILES['image']['size'] > 0) {
            $image = "images/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }
        $data['image'] = $image;
        (new Product())->insert($data);
        header("Location: index.php?ctl=product-list");
        die;
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
    
            // Kiểm tra xem người dùng có tải ảnh lên không
            if ($_FILES['image']['size'] > 0) {
                $image = "images/" . $_FILES['image']['name'];
                $data['image'] = $image;  // Cập nhật ảnh mới
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            } else {
                // Nếu không tải ảnh lên, giữ lại ảnh cũ
                $data['image'] = $data['old_image'];  // Giữ lại ảnh cũ
            }
    
            // Loại bỏ old_image khỏi mảng $data trước khi truyền vào phương thức update
            unset($data['old_image']);  // Loại bỏ tham số old_image
    
            // Thêm tham số 'id' vào mảng $data để đảm bảo 'WHERE' có giá trị 'product_id'
            $data['id'] = $_GET['id'];  // Lấy ID từ URL và thêm vào mảng $data
    
            // Cập nhật sản phẩm
            (new Product())->update($data);
    
            // Chuyển hướng về danh sách sản phẩm
            header("Location: index.php?ctl=product-list");
            die;
        }
        
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'];
        
        // Lấy danh sách danh mục và thông tin sản phẩm
        $categories = (new Category())->all();
        $product = (new Product())->find_one($id);
        
        // Truyền dữ liệu vào view
        view('product/edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }
}
