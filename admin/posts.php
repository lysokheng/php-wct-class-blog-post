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
                        <label for="title">Title: </label>
                        <input type="text" id="title" name="title"><br><br>
                        <label for="content">Content: </label>
                        <input type="text" id="content" name="content"><br><br>
                        Select image to upload:
                        <input type="file" name="image" id="image">

                        <br><br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="clear" class="btn btn-danger" value="Clear">
                    </form>

                    <div class="my-5">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">#</th>
                                    <th scope="col" class="col-2">Title</th>
                                    <th scope="col" class="col-4">Content</th>
                                    <th scope="col" class="col-4">Image</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($_SESSION['posts'])) {
                                    $count = 1;
                                    foreach ($_SESSION['posts'] as $post) {
                                        echo '
                                                    <tr>
                                                        <td>' . $count++ . '</td>
                                                        <td>' . $post->title . '</td>
                                                        <td>' . $post->content . '</td>
                                                        <td><img src="../assets/img/' . $post->image . ' " width="500" height="300" /></td>
                                                    </tr>
                                                ';
                                    }

                                    ?>

                                <?php } else { ?>
                                    <tr>
                                        <td colspan=" 5">
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