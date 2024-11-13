<h2>Danh sách danh mục</h2>
<a href="index.php?ctl=category-add">Thêm danh mục</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?= $category['category_id'] ?></td>
        <td><?= $category['category_name'] ?></td>
        <td>
            <a href="index.php?ctl=category-edit&id=<?= $category['category_id'] ?>">Sửa</a>
            <a href="index.php?ctl=category-delete&id=<?= $category['category_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
