<?php include 'process_form.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Posts</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Main Content-->
    <main class="mb-4 mt-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10">
                    <h2>Post list</h2>
                    <form method="post" action="process_form.php">
                        <label for="title">title</label>
                        <input type="text" id="title" name="title"><br><br>
                        <label for="content">content</label>
                        <input type="text" id="content" name="content"><br><br>
                        <label for="image">image</label>
                        <input type="text" id="image" name="image"><br><br>
                        <input type="submit" value="Submit">
                    </form>

                    <div class="my-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn
                                            btn-primary" data-bs-toggle="modal" data-bs-target="#modalNewPost">
                                            + (New Post)
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalNewPost" tabindex="-1"
                                            aria-labelledby="modalNewPostLabel" aria-hidden="true"
                                            action="../server/post.php" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title
                                                            fs-5" id="modalNewPostLabel">Create
                                                            new Post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="frmNewPost" action="" method="post">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Post Title</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" placeholder="Post Title">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="content" class="form-label">Post
                                                                    Content</label>
                                                                <input type="text" class="form-control" id="content"
                                                                    name="content" placeholder="Post Content">
                                                            </div>
                                                            <div class="mb-3">
                                                                <form action="upload.php" method="post"
                                                                    enctype="multipart/form-data">
                                                                    Select image to upload:
                                                                    <input type="file" name="image" id="fileToUpload">

                                                                </form>

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn
                                                            btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn
                                                            btn-primary" value="submit"
                                                            data-bs-dismiss="modal">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($posts)) {
                                    $count = 1;
                                    foreach ($posts as $post) {
                                        echo '
                                                    <tr>
                                                        <td>' . $count++ . '</td>
                                                        <td>' . $post->title . '</td>
                                                        <td>' . $post->content . '</td>
                                                        <td><img src="' . $post->image . '" /></td>
                                                    </tr>
                                                ';
                                    }

                                    ?>

                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5">
                                            <p>No record</p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>