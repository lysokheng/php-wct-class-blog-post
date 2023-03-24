<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_post'])) {
    $post_id = mysqli_real_escape_string($con, $_POST['delete_post']);

    $query = "DELETE FROM posts WHERE id='$post_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Post Deleted Successfully";
        header("Location: posts.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Post Not Deleted";
        header("Location: posts.php");
        exit(0);
    }
}

if (isset($_POST['update_post'])) {

    //validate image upload
    $image = $_FILES['image'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {
                $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                $imageDestination = '../uploads/' . $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);

                $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
                $title = mysqli_real_escape_string($con, $_POST['title']);
                $content = mysqli_real_escape_string($con, $_POST['content']);
                $image = mysqli_real_escape_string($con, $_POST['image']);

                $query = "UPDATE posts SET title='$title', content='$content', image='$imageDestination' WHERE id='$post_id' ";
                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    $_SESSION['message'] = "Post Updated Successfully";
                    header("Location: posts.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Post Not Updated";
                    header("Location: posts.php");
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Your image is too big!";
                header("Location: posts.php");

            }
        } else {
            $_SESSION['message'] = "There was an error uploading your image!";
            header("Location: posts.php");

        }
    } else {
        $_SESSION['message'] = "You cannot upload images of this type!";
        header("Location: posts.php");

    }



}


if (isset($_POST['save_post'])) {

    //validate image upload
    $image = $_FILES['image'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {
                $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                $imageDestination = '../uploads/' . $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);

                $title = mysqli_real_escape_string($con, $_POST['title']);
                $content = mysqli_real_escape_string($con, $_POST['content']);
                $image = mysqli_real_escape_string($con, $_POST['image']);
                $created = mysqli_real_escape_string($con, $_POST['created']);

                $query = "INSERT INTO posts (title,content,image,created) VALUES ('$title','$content','$imageDestination','$created')";

                $query_run = mysqli_query($con, $query);
                if ($query_run) {
                    $_SESSION['message'] = "Post Created Successfully";
                    header("Location: post-create.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Post Not Created";
                    header("Location: post-create.php");
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Your image is too big!";
                header("Location: post-create.php");

            }
        } else {
            $_SESSION['message'] = "There was an error uploading your image!";
            header("Location: post-create.php");

        }
    } else {
        $_SESSION['message'] = "You cannot upload images of this type!";
        header("Location: post-create.php");

    }
}

?>