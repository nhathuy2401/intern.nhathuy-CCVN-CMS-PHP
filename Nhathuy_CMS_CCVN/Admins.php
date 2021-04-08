<?php require_once  'Include/Sessions.php'?>
<?php require_once 'Include/Database.php'?>
<?php require_once 'Include/Functions.php'?>
<?php
global  $conn ;

if(isset($_POST['submit'])){
    $UserName = $_POST['username'];
    $Name = $_POST['name'];
    $Password = $_POST['password'];
    $ConfirmPassword =$_POST['confirmpassword'];
    $Admin = $_SESSION['AdminName'];
    date_default_timezone_set("Asia/Bangkok");
    $currentTime = time();
    $dateTime = strftime("%D-%M-%Y");


    if(empty($UserName)||empty($Name)||empty($Password)||empty($ConfirmPassword)){
        $_SESSION['errorMessage'] = "Please enter all field";
        redirect_To("Admins.php");
    } elseif(strlen($Password)<3){
        $_SESSION['errorMessage'] = "Password should be greater 3 character";
    } elseif ($Password != $ConfirmPassword) {
        $_SESSION['errorMessage'] = "Password & confirm password can't not match";
        redirect_To("Admins.php");
    } elseif (checkUserNameExist($UserName)){
            $_SESSION['errorMessage'] = "Username already exist";
        redirect_To("Admins.php");
    }  else {
        $sql = "INSERT INTO admins(username, aname, password, datetime, addby) VALUES (:username,:aname,:password,:datetime,:addby)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username',$UserName);
        $stmt->bindValue(':aname',$Name);
        $stmt->bindValue(':password',$Password);
        $stmt->bindValue(':datetime',$dateTime);
        $stmt->bindValue(':addby',$Admin);
        $Execute = $stmt->execute();

        if($Execute){
            $_SESSION['successMessage'] = "Success add Admin";
            redirect_To("Admins.php");
        } else {
            $_SESSION['errorMessage'] = "Wrong ";
            redirect_To("Admins.php");
        }
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
    <title>Document</title>
</head>
<body>

<navbar class="navbar navbar-expand-lg p-3 mb-2 bg-dark text-white">
    <div class="container">
        <a href="#" class="navbar-brand text-white" >Blog</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="Myprofile.php" class="nav-link" > <i class="far fa-user"></i> My Profile</a>
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
                <a href="index.php" class="nav-link">Live Blog</a>
            </li>
            <li class="nav-item d-flex">
                <a href="index.php" class="nav-link"> <i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ul>
    </div>
</navbar>
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fas fa-edit" style="color: yellow"></i>Categories</h1>
            </div>
        </div>
    </div>
</header>
<section class="container py-2 mb-4">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
            <?php
            echo errorMessage();
            echo successMessage();
            ?>
            <form action="Admins.php" method="post">
                <div class="card bg-secondary text-light mb-3">
                    <div class="card-header">
                        <h1>Add New Admin</h1>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <label for="username">
                                <span class="FieldInfo"> Username  : </span>
                            </label>
                            <input type="text" class="form-control" name="username" id="username">
                            <label for="name">
                                <span class="FieldInfo"> Name  : </span>
                                <small class="text-warning text-muted">Optional</small>
                            </label>
                            <input type="text" class="form-control" name="name" id="name">
                            <label for="password">
                                <span class="FieldInfo"> Password: </span>
                            </label>
                            <input type="text" class="form-control" name="password" id="password">
                            <label for="confirmpassword">
                                <span class="FieldInfo"> Confirm Password  : </span>
                            </label>
                            <input type="text" class="form-control" name="confirmpassword" id="confirmpassword">

                        </div>
                        <div class="row" >
                            <div class="col-lg-6" >
                                <a href="DashBoard.php" class="btn btn-warning btn-block " style="color: dimgray"> <i class="fas fa-arrow-left"></i> Back to dashboard</a>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-publish">Add Admin</i>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/aaceb4f3c6.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
