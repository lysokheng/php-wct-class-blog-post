<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Post Create</title>
</head>

<body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Post Add
                            <a href="posts.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Post Title</label>
                                <input type="title" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Post Content</label>
                                <input type="content" name="content" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Post Image</label>
                                <br>
                                <input type="file" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label>Post Created</label> <br>

                                <input type="datetime-local" name="created" value="<?= date('Y-m-d\TH:i') ?>"
                                    id="created">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_post" class="btn btn-primary">Save Post</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>