<?php require '../connection/config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        echo header('Location:index.php?msg=InvalidUser');
    }
} else {
    echo header('Location:index.php?msg=InvalidId');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-6 my-5 py-5">
        <h1 class="text-center">Edit User</h1>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (!empty($name) && !empty($email)) {
                $result1 = $conn->query("UPDATE users SET name='$name' , email='$email' WHERE id=$id");
                if ($result1) {
                    echo "<script>alert('User Updated Successfully');</script>";
                    echo "<script>window.location.href='index.php';</script>";
                } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Some error occured! Please try again.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
                }
            } else {
                ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>All fields are required.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        }
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>