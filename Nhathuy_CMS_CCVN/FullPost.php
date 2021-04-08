<?php require_once "Include/Database.php" ?>
<?php require_once "Include/Sessions.php"?>
<?php require_once "Include/Functions.php" ?>
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

        <a href="#" class="navbar-brand text-white" >Blog</a>
        <ul class="navbar-nav ">
            <li class="nav-item" >
                <a href="index.php" class="nav-link text-white" > <i class="far fa-user"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">About Us</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white" ">Blog</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Contact us</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Comment</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Features</a>
            </li>
            <ul class="nav-bar-nav ml-auto">
                <form action="index.php" class="form-inline d-none d-sm-block">
                    <div class="form-group">
                        <input  class="form-control mr-2"type="text" name="Search" placeholder="Type Here">
                        <button class="btn btn-primary" name="SearchButton">Search</button>

                    </div>
                </form>
            </ul>
        </ul>
    </div>
</navbar>

<div class="container">
    <div class="row mt-4">
        <div class="col-sm-8" >
            <h1>CMS Blog</h1>
            <h1 class="lead">Nhathuy2401</h1>
            <?php
            global $conn ;
            $Search_Btn = $_GET['SearchButton'];
            $Search = $_GET['Search'];
            if(isset($Search_Btn)){
                $sql = "SELECT * FROM post_tbl
                    WHERE  datetime LIKE :search
                    OR title LIKE :search 
                    OR category LIKE :search
                    OR post LIKE :search";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':search','%'.$Search.'%');
                $stmt->execute();
                ;
            } else {
                $PostIdFromUrl = $_GET['id'];
                if(!isset($PostIdFromUrl)){
                    $_SESSION['errorMessage'] = "Bad Request";
                    redirect_To('index.php');
                }
                $sql = "SELECT * FROM post_tbl WHERE id = '$PostIdFromUrl'";
                $stmt = $conn->query($sql);
            }

            while ($DataRow = $stmt->fetch()){
                $PostId = $DataRow['id'];
                $PostTime = $DataRow['datetime'];
                $PostTitle = $DataRow['title'];
                $PostCategory = $DataRow['category'];
                $Admin = $DataRow['author'];
                $PostImage = $DataRow['image'];
                $PostDescription = $DataRow['post'];

                ?>
                <div class="card">
                    <img src="Uploads/<?= $PostImage?>" style="max-height: 450px" class="img-fluid card-img-top"/>
                    <div class="card-body">
                        <h4 class="card-title"><?= $PostTitle ?></h4>
                        <small> Writen by <?= $Admin?> On <?= $PostTime?></small>
                        <span class="badge badge-dark text-light" style="float:right">20 Comments</span>
                        <hr>
                        <p class="card-text"><?php
                                echo $PostDescription;
                                ?></p>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>

        </div>
        <div class="col-sm-4" style="min-height: 40px;background: green">

        </div>
    </div>
</div>

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
