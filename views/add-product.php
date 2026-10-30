<?php
// [EN] Start session and check if user is logged in
// [JP] セッションを開始し、ログインしているか確認します
session_start();

if (!isset($_SESSION['id'])) {
    header('location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- [EN] Bootstrap 5 CSS -->
    <!-- [JP] Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- [EN] Font Awesome -->
    <!-- [JP] Font Awesome アイコン -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <!-- [EN] Navigation bar -->
    <!-- [JP] ナビゲーションバー -->
    <nav class="navbar navbar-expand navbar-light bg-white py-3 shadow-sm mb-5">
        <div class="container">
            <!-- [EN] Home icon -->
            <!-- [JP] ホームアイコン -->
            <a href="dashboard.php" class="navbar-brand text-secondary">
                <i class="fa-solid fa-house fa-2x"></i>
            </a>

            <!-- [EN] Welcome message -->
            <!-- [JP] ウェルカムメッセージ -->
            <div class="mx-auto">
                <h2 class="h4 fw-bold text-secondary mb-0">
                    Welcome, <?= htmlspecialchars($_SESSION['full_name']) ?>
                </h2>
            </div>

            <!-- [EN] Logout icon -->
            <!-- [JP] ログアウトアイコン -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger" title="Logout">
                        <i class="fa-solid fa-user-xmark fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- [EN] Main content: Add Product Form -->
    <!-- [JP] メインコンテンツ：商品追加フォーム -->
    <main class="container" style="max-width: 500px;">
        <h2 class="fw-bold fs-3 text-dark mb-4 text-center">Add Product</h2>

        <form action="../actions/add-product.php" method="post">
            <!-- [EN] Product Name Input -->
            <!-- [JP] 商品名入力欄 -->
            <div class="mb-3">
                <label for="product_name" class="form-label text-secondary">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>

            <!-- [EN] Price Input -->
            <!-- [JP] 価格入力欄 -->
            <div class="mb-3">
                <label for="price" class="form-label text-secondary">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>

            <!-- [EN] Quantity Input -->
            <!-- [JP] 数量入力欄 -->
            <div class="mb-4">
                <label for="quantity" class="form-label text-secondary">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <!-- [EN] Add Button -->
            <!-- [JP] 追加ボタン -->
            <button type="submit" name="btn_add" class="btn btn-info text-white w-100 fw-bold py-2">Add</button>
        </form>
    </main>

    <!-- [EN] Bootstrap JS -->
    <!-- [JP] Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>