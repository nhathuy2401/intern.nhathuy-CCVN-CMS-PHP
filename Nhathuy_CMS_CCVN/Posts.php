<!doctype html>
<html lang="en">
<?php require_once 'Include/Database.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/style.css">
    <title>Posts</title>
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
                <h1><i class="fas fa-blog" style="color: yellow"></i>Blog Post</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="AddNewPost.php" class="btn btn-primary btn-block">
                    <i class="fas fa-edit"> Add New Blog</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Categories.php" class="btn btn-info btn-block">
                    <i class="fas fa-edit"> Add New Category</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Admin.php" class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus">Add New Admin</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php" class="btn btn-success btn-block">
                    <i class="fas fa-check">Approve Comment</i>
                </a>
            </div>
        </div>
    </div>
</header>

<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date&Time</th>
                    <th>Author</th>
                    <th>Banner</th>
                    <th>Action</th>
                    <th>Comment</th>
                    <th>Live Preview</th>
                </tr>
                </thead>
                <?php
                global $conn ;
                $sql = "SELECT * FROM post_tbl";
                $stmt = $conn->query($sql);
                $Sr = 0 ;
                while ($DateRow = $stmt->fetch()){
                    $Id = $DateRow['id'];
                    $Category = $DateRow['category'];
                    $PostTitle = $DateRow['title'];
                    $DateTime = $DateRow['datetime'];
                    $Author = $DateRow['author'];
                    $Image = $DateRow['image'];
                    $Description = $DateRow['post'];
                    $Sr++;


                ?>
                    <tbody>
                    <tr>
                        <td><?= $Sr ?></td>
                        <td class="table-danger"><?= $PostTitle ?></td>
                        <td><?= $Category ?></td>
                        <td>
                            <?php
                            if(strlen($DateTime)>8){
                                $DateTime=substr($DateTime,8,16);}
                            echo $DateTime;
                            ?>

                        </td>
                        <td class="table-primary"><?= $Author ?></td>
                        <td><img src="Uploads/<?=$Image?>" width="200px" height="50px"> </td>
                        <td>
                            <a href="EditPost.php?id=<?=$Id ?>"><span class="btn btn-warning">Edit</span></a>
                            <a href="DeletePost.php?id=<?=$Id?>"><span class="btn btn-danger">Delete</span></a>
                        </td>
                        <td>
                            <a href=""><span class="btn btn-primary">LivePreview</span></a>
                        </td>
                        <td>Comment</td>

                    </tr>
                    </tbody>
                <?php
                }
                ?>


            </table>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
