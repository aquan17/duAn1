<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($productOne['product_name']) ?></title>
  <link rel="stylesheet" href="assets/css/detail.css">
</head>

<body>
<?php
require_once "views/menu.php";
?>
<div class="container">
  <header>
    <h1>Product Page</h1>
  </header><br><br>
  <main>
    <div class="product">
      <img src="assets/images/<?= htmlspecialchars($productOne['product_img']) ?>" alt="Product Image">
      <div class="product-info">
        <h2><?= htmlspecialchars($productOne['product_name']) ?></h2>
        <div class="price"><?= number_format($productOne['price']) ?> ₫</div>
        <div class="promotions">
          <h3>Khuyến mãi hot nhất:</h3>
          <ul>
            <li>Miễn phí vận chuyển với đơn hàng 200k</li>
            <li>Giftcard lên tới 100K</li>
            <li>Phiếu mua hàng trị giá 50K</li>
          </ul>
        </div>
        <div class="actions">
          <span class="quantity">Còn hàng:</span>
          <input type="number" value="1">
          <button class="add-to-cart">Mua hàng</button>
        </div>
      </div>
    </div>
    <div class="description">
      <h2>Sản phẩm tương tự</h2>
    </div>
    <div class="related-products">
    <div class="related-products">
    <?php foreach ($randomProducts as $index => $product) { ?>
        <div class="product-item">
            <a href="?act=detailpro&id=<?= $product['product_id'] ?>">
                <img src="assets/images/<?= htmlspecialchars($product['product_img']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
            </a>
            <h3><a href="?act=detailpro&id=<?= $product['product_id'] ?>"><?= htmlspecialchars($product['product_name']) ?></a></h3>
            <p><?= number_format($product['price']) ?>₫</p>
        </div>
    <?php } ?>
</div>

    </div>
  </main>
  <?php
  require_once "views/footer.php";
  ?>
</div>
</body>

</html>
