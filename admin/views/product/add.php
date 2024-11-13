<h2>Thêm sản phẩm mới</h2>
<form action="index.php?ctl=product-store" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề:</label>
    <input type="text" name="title" required><br>

    <label>Giảm giá:</label>
    <input type="number" name="discount"><br>

    <label>Hình ảnh:</label>
    <input type="file" name="image"><br>

    <label>Mô tả:</label>
    <textarea name="description"></textarea><br>

    <label>Giá:</label>
    <input type="number" name="price" required><br>

    <label>Số lượng:</label>
    <input type="number" name="quantity"><br>

    <label for="category_id">Danh Mục:</label>
<select id="category_id" name="category_id" required>
    <option value="">-- Chọn Danh Mục --</option>
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['category_id']; ?>"> <!-- Dùng 'id' làm giá trị -->
            <?php echo $category['category_name']; ?>  <!-- Hiển thị tên danh mục -->
        </option>
    <?php endforeach; ?>
</select><br>


    <button type="submit">Lưu</button>
</form>
