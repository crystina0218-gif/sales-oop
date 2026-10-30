<?php
session_start();
require_once "../classes/Product.php";

$product_obj = new Product;
$product = $product_obj->getProduct($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-white py-3 shadow-sm mb-5">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand text-secondary">
                <i class="fa-solid fa-house fa-2x"></i>
            </a>
            <div class="mx-auto">
                <h2 class="h4 fw-bold text-secondary mb-0">
                    Welcome, <?= htmlspecialchars($_SESSION['full_name'] ?? '') ?>
                </h2>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger" title="Logout">
                        <i class="fa-solid fa-user-xmark fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container" style="max-width: 500px;">
        <h2 class="fw-bold fs-3 text-dark mb-4 text-center">Buy Product</h2>

        <form action="../actions/buy-product.php" method="post">
            <!-- 購入対象のID -->
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <div class="mb-3">
                <p class="text-secondary mb-1">Product Name</p>
                <h3 class="h4 fw-bold text-dark"><?= htmlspecialchars($product['product_name']) ?></h3>
            </div>

            <div class="mb-3">
                <p class="text-secondary mb-1">Price</p>
                <h3 class="h4 fw-bold text-dark">$ <?= number_format($product['price'], 2) ?></h3>
            </div>

            <div class="mb-3">
                <p class="text-secondary mb-1">Stocks Left</p>
                <h3 class="h4 fw-bold text-dark"><?= $product['quantity'] ?></h3>
            </div>

            <div class="mb-4">
                <label for="quantity_buy" class="form-label text-secondary">Buy Quantity</label>
                <input type="number" name="quantity_buy" id="quantity_buy" min="1" max="<?= $product['quantity'] ?>" class="form-control" required>
            </div>

            <button type="submit" name="btn_buy" class="btn btn-success text-white w-100 fw-bold py-2">Pay</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>