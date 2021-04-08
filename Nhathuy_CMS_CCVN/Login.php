<?php
require_once 'Include/Database.php';
require_once 'Include/Sessions.php';
require_once 'Include/Functions.php';


$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
if (empty($UserName) || empty($Password)) {
    $_SESSION['errorMessage'] = "Please enter all field";
} else {
    $found_account = login_Attempt($UserName, $Password);
    if ($found_account) {
        $_SESSION['user_id'] = $found_account['id'];
        $_SESSION['AdminName'] = $found_account['aname'];
        $_SESSION['UserName'] = $found_account['username'];
        $_SESSION['password'] = $found_account['password'];
        $_SESSION['successMessage'] = "Welcome admin ".$_SESSION['AdminName'];
        redirect_To("DashBoard.php");
    } else {
        $_SESSION['errorMessage'] = "Incorrect Username/Password";
    }


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
</head>
<body>
<navbar class="navbar navbar-expand-lg p-3 mb-2 bg-dark text-white">
    <div class="container">
        <a href="#" class="navbar-brand text-white">Blog</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="Myprofile.php" class="nav-link"> <i class="far fa-user"></i> My Profile</a>
            </li>
            <li class="nav-item">
                <a href="Dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="Categories.php" class="nav-link ">Categories</a>
            </li>
            <li class="nav-item">
                <a href="ManageAdmin.php" class="nav-link">Manage Admin</a>
            </li>
            <li class="nav-item">
                <a href="Comments.php" class="nav-link">Comments</a>
            </li>
            <li class="nav-item">
                <a href="Blog.php" class="nav-link">Live Blog</a>
            </li>
            <li class="nav-item d-flex">
                <a href="Blog.php" class="nav-link"> <i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>


        </ul>


    </div>


</navbar>
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</header>
<section class="container py-2 mb-4">
    <div class="row">
        <div class="offset-sm-3 col-sm-6">
            <div class="card bg-secondary text-light">
                <?= errorMessage() ?>
                <?= successMessage() ?>
                <div class="card-header">
                    <h4>Welcome Back !!</h4>
                </div>
                <form action="Login.php" method="post">
                    <div class="form-group">
                        <label for="username"><span class="FieldInfo">Username :</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="UserName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username"><span class="FieldInfo">Password :</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white bg-info"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="Password">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info btn-block" value="Login">
                </form>
            </div>
        </div>
    </div>
</section>

<br>
<footer class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">CODE-COMPLETEVN</p>
            </div>
        </div>
    </div>
</footer>


</body>

<script src="https://kit.fontawesome.com/aaceb4f3c6.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</html>
