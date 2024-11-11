<?php

require_once 'models/categoryModel.php';

class categoryController
{
    public $categoryModel;

    function __construct()
    {
        $this->categoryModel = new categoryModel();
    }

    function listCategory()
    {
        $allCategories = $this->categoryModel->getAllCategories();
        require_once 'views/listCategory.php';
    }

    function insertCategory()
    {
        require_once 'views/insertCategory.php';
        if (isset($_POST['btn_insert'])) {
            $name = $_POST['name'];

            if (empty($name)) {
                echo "Vui lòng điền tên danh mục.";
                return;
            }

            if ($this->categoryModel->insertCategory($name)) {
                header("Location: ?act=listcategory");
            } else {
                echo "Lỗi khi chèn danh mục vào cơ sở dữ liệu.";
            }
        }
    }

    function updateCategory($id)
    {
        $oneCategory = $this->categoryModel->findCategoryById($id);
        require_once 'views/updateCategory.php';
        if (isset($_POST['btn_update'])) {
            $name = $_POST['name'];

            if (empty($name)) {
                echo "Vui lòng điền tên danh mục.";
                return;
            }

            if ($this->categoryModel->updateCategory($id, $name)) {
                header("Location:?act=listcategory");
            } else {
                echo "Lỗi";
            }
        }
    }

    function deleteCategory($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header("Location: ?act=listcategory");
        } else {
            echo "Lỗi khi xóa danh mục.";
        }
    }
}
?>
