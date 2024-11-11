<!-- views/category/add.php -->

<h2>Thêm mới danh mục</h2>
<form action="index.php?controller=CategoryController&action=store" method="POST">
    <label for="category_name">Tên danh mục:</label>
    <input type="text" name="category_name" required>
    <button type="submit">Lưu</button>
</form>
<a href="index.php?controller=CategoryController&action=index">Quay lại danh sách</a>
