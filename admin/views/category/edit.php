<!-- views/category/edit.php -->

<h2>Sửa danh mục</h2>
<form action="index.php?controller=CategoryController&action=update&id=<?php echo $categoryData['category_id']; ?>" method="POST">
    <label for="category_name">Tên danh mục:</label>
    <input type="text" name="category_name" value="<?php echo $categoryData['category_name']; ?>" required>
    <button type="submit">Cập nhật</button>
</form>
<a href="index.php?controller=CategoryController&action=index">Quay lại danh sách</a>
