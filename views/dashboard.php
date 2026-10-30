<?php
// [EN] Start the session to manage user login state
// [JP] ユーザーのログイン状態を管理するためにセッションを開始します
session_start();

// [EN] Check if user is NOT logged in, then redirect to login page
// [JP] ログインしていない場合はログインページ（index.php）にリダイレクトします
if (!isset($_SESSION['id'])) {
    header('location: index.php');
    exit;
}

// [EN] Require the Product.php file 
// [JP] Product.php ファイルを読み込みます
require_once '../classes/Product.php';

// [EN] Create an instance of Product class
// [JP] Product クラスのインスタンスを作成します
$product = new Product;

// [EN] Retrieve all products data from the database
// [JP] データベースからすべての商品データを取得します
$all_products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- [EN] Bootstrap 5 CSS -->
    <!-- [JP] Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- [EN] Font Awesome (Load Font Awesome for icons) -->
    <!-- [JP] アイコン用の Font Awesome を読み込みます -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <!-- [EN] Navigation bar with gray icons and text matching the design -->
    <!-- [JP] デザインに合わせたグレーのアイコンとテキストを持つナビゲーションバー -->
    <nav class="navbar navbar-expand navbar-light bg-white py-3 shadow-sm mb-5">
        <div class="container">
            <!-- [EN] Home icon -->
            <!-- [JP] ホームアイコン -->
            <a href="dashboard.php" class="navbar-brand text-secondary">
                <i class="fa-solid fa-house fa-2x"></i>
            </a>

            <!-- [EN] Welcome message in center -->
            <!-- [JP] 中央のウェルカムメッセージ -->
            <div class="mx-auto">
                <h2 class="h4 fw-bold text-secondary mb-0">
                    Welcome, <?= htmlspecialchars($_SESSION['full_name']) ?>
                </h2>
            </div>

            <!-- [EN] Logout icon on the right -->
            <!-- [JP] 右側のログアウトアイコン -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger" title="Logout">
                        <i class="fa-solid fa-user-xmark fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- [EN] Main content: Product List table -->
    <!-- [JP] メインコンテンツ：商品一覧テーブル -->
    <main class="container" style="max-width: 950px;">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h1 class="fw-bold fs-2 text-dark">Product List</h1>
            </div>
            <div class="col text-end">
                <!-- [EN] Add product button (Plus icon) -->
                <!-- [JP] 商品追加ボタン（プラスアイコン） -->
                <a href="add-product.php" class="text-info fs-1 text-decoration-none">
                    <i class="fa-solid fa-circle-plus"></i>
                </a>
            </div>
        </div>

        <!-- [EN] Product Table -->
        <!-- [JP] 商品テーブル -->
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // [EN] Check if products exist and loop through them
                    // [JP] 商品が存在するか確認し、ループ処理で1件ずつ展開します
                    if ($all_products && $all_products->num_rows > 0) {
                        while ($row = $all_products->fetch_assoc()) {
                    ?>
                            <tr>
                                <!-- [EN] Display database product details -->
                                <!-- [JP] データベースから取得した商品の詳細情報を表示します -->
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['product_name']) ?></td>
                                <td><?= htmlspecialchars($row['price']) ?></td>
                                <td><?= htmlspecialchars($row['quantity']) ?></td>
                                <td>
                                    <!-- [EN] Edit Button -->
                                    <!-- [JP] 編集ボタン -->
                                    <a href="edit-product.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-1 text-white">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- [EN] Delete Button -->
                                    <!-- [JP] 削除ボタン -->
                                    <a href="../actions/delete-product.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm me-1">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <!-- [EN] Buy/Checkout Button -->
                                    <!-- [JP] 購入ボタン -->
                                    <a href="buy-product.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-cash-register"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <!-- [EN] Display message if no products are found -->
                        <!-- [JP] 商品が見つからない場合にメッセージを表示します -->
                        <tr>
                            <td colspan="5" class="text-muted">No products found.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- [EN] Bootstrap 5 JS Bundle -->
    <!-- [JP] Bootstrap 5 JS バンドル -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>