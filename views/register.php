
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
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>

<div class="container">
    <div class="card mt-5">
        <p><h3 class="text-center">Register Login</h3></p>

        <form method="POST" action="index.php?controller=Register&action=mainActionForm">
            <?php
            if (isset($_COOKIE['error'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">';
                echo $_COOKIE['error'];
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
            }
            ?>
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input id="Username" type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input id="Password" type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Password_Confirm" class="form-label">Password</label>
                <input id="Password_Confirm" type="password" name="password_confirm" placeholder="Password Confirm" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <div class="w-100 text-center">
            <a href="index.php" class="btn btn-link fit-content">Back Login</a>
        </div>
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
<script src="./assets/js/login.js"></script>
</body>
</html>

