<?php
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

    <title>Post View</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Post View Details
                            <a href="posts.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $post_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM posts WHERE id='$post_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $post = mysqli_fetch_array($query_run);
                                ?>

                                <div class="mb-3">
                                    <label>Post Title</label>
                                    <p class="form-control">
                                        <?= $post['title']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Post Content</label>
                                    <p class="form-control">
                                        <?= $post['content']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Post Image</label>
                                    <p class="form-control">
                                        <?php
                                        echo "<img src='" . $post['image'] . "' width='300' height='200'>";
                                        ?>
                                    </p>
                                </div>


                                <?php
                            } else {

                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>