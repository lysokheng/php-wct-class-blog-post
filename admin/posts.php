<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Post CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Post Details
                            <a href="Post-create.php" class="btn btn-primary float-end">Add Posts</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM Posts";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $post) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $post['id']; ?>
                                            </td>
                                            <td>
                                                <?= $post['title']; ?>
                                            </td>
                                            <td>
                                                <?= $post['content']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo "<img src='" . $post['image'] . "' width='300' height='200'>";
                                                ?>
                                            </td>

                                            <td>
                                                <a href="post-view.php?id=<?= $post['id']; ?>"
                                                    class="btn btn-info btn-sm">View</a>
                                                <a href="post-edit.php?id=<?= $post['id']; ?>"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="post" class="d-inline">
                                                    <button type="submit" name="delete_post" value="<?= $post['id']; ?>"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>