<!-- views/category/list.php -->

<h2>Danh sách danh mục</h2>
<a href="index.php?ctl=add">Thêm mới danh mục</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['category_id']; ?></td>
        <td><?php echo $category['category_name']; ?></td>
        <td>
            <a href="index.php?ctl=edit&id=<?php echo $category['category_id']; ?>">Sửa</a> |
            <a href="index.php?ctl=delete&id=<?php echo $category['category_id']; ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
