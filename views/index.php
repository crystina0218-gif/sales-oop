<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="bg-light">
    <!--center the form on the screen-->
    <div style="height: 100vh;" class="row justify-content-center align-items-center">
        <div class="col-3">

            <div class="card border-0 shadow px-4 py-3">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h1 class="text-primary fw-bold">LOGIN<i class="fa-solid fa-right-to-bracket"></i></h1>
                    </div>
                    <!--Specify the action destination  to send data-->
                    <form action="../actions/login.php" method="post">

                        <div class="mb-3">
                            <label for="username" class="form-label text-muted">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <!--login button-->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mb-3">Login</button>
                        <!--link button to registration page-->
                        <a href="register.php" class="btn btn-danger w-100 py-2 fw-bold">Create an Account</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>