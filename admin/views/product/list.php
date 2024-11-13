<h2>Danh sách sản phẩm</h2>
<a href="index.php?ctl=product-add">Thêm sản phẩm</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Giảm giá</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['product_id'] ?></td>
        <td><?= $product['title'] ?></td>
        <td><?= $product['discount'] ?>%</td>
        <td><img src="images/<?= $product['image'] ?>" width="50" height="50"></td>
        <td><?= $product['description'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['quantity'] ?></td>
        <td><?= $product['category_id'] ?></td>
        <td>
            <a href="index.php?ctl=product-edit&id=<?= $product['product_id'] ?>">Sửa</a>
            <a href="index.php?ctl=product-delete&id=<?= $product['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
