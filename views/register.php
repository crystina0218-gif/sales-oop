<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>



<body class="bg-light">
    <!--//Center the form on the screen-->
    <div style="height: 100vh" class="row  justify-content-center align-items-center">
        <div class="col-3">
            <div class="card border-0 shadow px-4 py-3">
                <div class="card-header bg-white border-0 text-center">
                    <h2 class="text-danger fw-bold">
                        <i class="fa-solid fa-user-plus"></i>Registration
                    </h2>
                </div>
                <div class="card-body">
                    <form action="../actions/register.php" method="post">
                        <div class="mb-3">
                            <label for="first_name" class="form-label text-muted small">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label text-muted small">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label text-muted small">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-muted small">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>