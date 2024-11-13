<h2>Chỉnh sửa sản phẩm</h2>
<form action="index.php?ctl=product-edit&id=<?= $product['product_id'] ?>" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề:</label>
    <input type="text" name="title" value="<?= $product['title'] ?>" required><br>

    <label>Giảm giá:</label>
    <input type="number" name="discount" value="<?= $product['discount'] ?>"><br>

    <label>Hình ảnh:</label>
    <input type="file" name="image">
    <!-- Hiển thị ảnh cũ nếu không tải ảnh mới -->
    <img src="<?= $product['image'] ?>" width="50" height="50"><br>

    <label>Mô tả:</label>
    <textarea name="description"><?= $product['description'] ?></textarea><br>

    <label>Giá:</label>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br>

    <label>Số lượng:</label>
    <input type="number" name="quantity" value="<?= $product['quantity'] ?>"><br>

    <label for="category_id">Danh Mục:</label>
    <select id="category_id" name="category_id" required>
        <option value="">-- Chọn Danh Mục --</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['category_id']; ?>" <?= $category['category_id'] == $product['category_id'] ? 'selected' : '' ?>>
                <?= $category['category_name']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Thêm một trường ẩn để gửi ảnh cũ -->
    <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

    <button type="submit">Lưu</button>
</form>
