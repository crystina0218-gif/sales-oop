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
    <title>Edit Product</title>
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
        <h2 class="fw-bold fs-3 text-dark mb-4 text-center">Edit Product</h2>

        <form action="../actions/edit-product.php" method="post">
            <!-- 更新対象を特定するための隠しID -->
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <div class="mb-3">
                <label for="product_name" class="form-label text-secondary">Product Name</label>
                <input type="text" name="product_name" id="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label text-secondary">Price</label>
                <input type="number" name="price" id="price" value="<?= $product['price'] ?>" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="quantity" class="form-label text-secondary">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="<?= $product['quantity'] ?>" class="form-control" required>
            </div>

            <button type="submit" name="btn_update" class="btn btn-warning text-white w-100 fw-bold py-2">Edit</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>