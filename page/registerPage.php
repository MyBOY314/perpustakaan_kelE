<!Doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            
            rel="stylesheet" integrity="sha384-
            EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <link href="../style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/56d4a45cd7.js" crossorigin="anonymous"></script>
        <title>Register Page</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">

            <a class="navbar-brand fw-bold" href="../index.php">PERPUSTAKAAN KEL E</a>
        </div>
        </nav>
        <div class="bg bg-light text-dark">
            <div class="container min-vh-100 mt-5 d-flex align-items-center justify-content-center">
                <div class="card text-white bg-dark ma-5 shadow " style="min-width:
                25rem;">
                    <div class="card-header fw-bold">Register</div>
                    <div class="card-body">
                        <form action="../process/registerProcess.php"
                            method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                            <i class="fa-sharp fa-solid fa-user"></i>
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input class="form-control" id="name" name="name"
                                aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                            <i class="fa-sharp fa-solid fa-envelope"></i>
                                <label for="exampleInputEmail1" class="form-
                                label">Email</label>
                                <input class="form-control" id="email"
                                name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-6">
                            <div class="mb-3">
                            <i class="fa-sharp fa-solid fa-image"></i>
                                <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                                <input type="file" name="my_image">
                            </div>
                            </div>
                            <div class="mb-3">
                            <i class="fa-sharp fa-solid fa-lock"></i>
                                <label for="exampleInputPassword1" class="form-
                                label">Password</label>
                                <input type="password" class="form-control"
                                id="password" name="password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary"
                                name="register">Register</button>
                            </div>
                        </form>
                        <p class="mt-2 mb-0">Have an account? <a
                        href="./loginPage.php" class="text-primary">Login here!</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>
</html>