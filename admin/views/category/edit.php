<h2>Chỉnh sửa danh mục</h2>
<form action="index.php?ctl=category-edit&id=<?= $category['category_id'] ?>" method="POST">
    <label>Tên danh mục:</label>
    <input type="text" name="category_name" value="<?= $category['category_name'] ?>" required><br>
    <button type="submit">Lưu</button>
</form>
