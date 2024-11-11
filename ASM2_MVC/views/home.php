<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <div class="container">
        <?php
        require_once "views/menu.php";
        ?>
        <h2 class="wrapper">ĐỒ ĂN VẶT</h2>
        <div class="product wrapper">
            <?php
            foreach ($getSnacks as $rows) { ?>
                <div class="pro-items">
                    <a href="?act=detailpro&id=<?= $rows['product_id'] ?>">
                        <img src="assets/images/<?= $rows['product_img'] ?>" alt="">
                    </a>
                    <h3 class="name-pro"><a href="?act=detailpro&id=<?= $rows['product_id'] ?>"><?= $rows['product_name'] ?></a></h3>
                    <p class="price"><?= number_format($rows['price']) ?><u>đ</u>
                        <span><?= $rows['discount'] ?>%</span>
                    </p>
                </div>
            <?php } ?>
        </div>
        <h2 class="wrapper">ĐỒ UỐNG</h2>
        <div class="product wrapper">
            <?php
            foreach ($getDrinks as $rows) { ?>
                <div class="pro-items">
                    <a href="?act=detailpro&id=<?= $rows['product_id'] ?>">
                        <img src="assets/images/<?= $rows['product_img'] ?>" alt="">
                    </a>
                    <h3 class="name-pro"><a href="?act=detailpro&id=<?= $rows['product_id'] ?>"><?= $rows['product_name'] ?></a></h3>
                    <p class="price"><?= number_format($rows['price']) ?><u>đ</u>
                </div>
            <?php } ?>
        </div>
        <h2 class="wrapper">Kem Xôi</h2>
        <div class="product wrapper">
            <?php
            foreach ($cream as $rows) { ?>
                <div class="pro-items">
                    <a href="?act=detailpro&id=<?= $rows['product_id'] ?>">
                        <img src="assets/images/<?= $rows['product_img'] ?>" alt="">
                    </a>
                    <h3 class="name-pro"><a href="?act=detailpro&id=<?= $rows['product_id'] ?>"><?= $rows['product_name'] ?></a></h3>
                    <p class="price"><?= number_format($rows['price']) ?><u>đ</u>
                </div>
            <?php } ?>
        </div><br><br>
        <?php
        require_once "views/footer.php";
        ?>
    </div>
</body>

</html>