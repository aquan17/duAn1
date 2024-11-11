<!DOCTYPE html>
<html>
<head>
    <title>Update Category</title>
</head>
<body>
    <h1>Update Category</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $oneCategory['cate_id'] ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $oneCategory['cate_name'] ?>" required>
        <button type="submit" name="btn_update">Update</button>
    </form>
</body>
</html>
