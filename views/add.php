<?php
if (empty($_SESSION['user']) && empty($usernameCookie) && empty($passwordCookie)) {
    header("Location: index.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <?php
        require_once('views/components/nav.php')
    ?>

<div class="container">
    <div class="card mt-5">
        <p><h3 class="text-center">Add Post</h3></p>

        <form method="POST" action="index.php?controller=Post&action=addAction">
            <?php
                if (isset($_COOKIE['error_add_post'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">';
                    echo $_COOKIE['error_add_post'];
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';
                }
            ?>
            <?php
                if (isset($_COOKIE['notification_error_post'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">';
                    echo $_COOKIE['notification_error_post'];
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';
                }
            ?>
            <div class="mb-3">
                <label for="Title" class="form-label">Title</label>
                <input id="Title" type="text" name="title" placeholder="Title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="Content">Content</label>
                <textarea class="form-control" id="Content" rows="3" name="content" placeholder="Content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
<script src="./assets/js/index.js"></script>
</body>
</html>