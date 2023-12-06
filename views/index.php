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
</head>
<body>

<?php
require_once('views/components/nav.php')
?>

<div class="container container-admin d-flex flex-wrap">
    <div class="w-100 d-flex align-items-center justify-content-between mt-3" style="text-align:end">
        <h3>List Post</h3>
        <a href="index.php?controller=Post&action=addForm" type="button" class="btn btn-success">Add Post</a>
    </div>
    <div class="card mt-5">
        <?php
            if (isset($_COOKIE['notification_success_post'])) {
                echo '<div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">';
                echo $_COOKIE['notification_success_post'];
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
            }
        ?>
        <table class="table table-striped mb-0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Handle</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $item) {
                echo "<tr>";
                echo "<td>" . $item['id'] . "</td>";
                echo "<td>" . $item['title'] . "</td>";
                echo "<td>" . $item['content'] . "</td>";
                echo "<td>" . $item['created_at'] . "</td>";
                echo "<td>" . $item['updated_at'] . "</td>";
                echo "<td>
                            <a class='btn btn-primary' 
                            href='index.php?controller=Post&action=editForm&id=" . $item['id'] . "'>Edit</a>
                            <button type='button' class='btn btn-danger js-delete-post' data-id = '" . $item['id'] . "'
                             data-toggle='modal' data-target='#deleteConfirmModal'>Delete</button>
                     </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">Are you sure you want to delete it?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a href="" data-href ="index.php?controller=Post&action=deleteAction&id="
                   class="btn btn-primary js-delete-confirm">Yes</a>
            </div>
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
<script src="./assets/js/index.js"></script>
</body>
</html>