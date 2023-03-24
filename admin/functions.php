<?php
require_once '../models/Post.php';

// Start PHP session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Authorize
if (!isset($_SESSION['auth'])) {
    header("Location: ../index.php");
    exit();
}



//title and content field of a form submitted with the POST method is set or not
if (isset($_POST['title']) && isset($_POST['content'])) {

    //The $post variable is assigned the new instance of the Post class,
    $post = new Post();

    //collect value of input field
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->image = $_POST['image'];

    //if $posts is not set
    if (!isset($_SESSION['posts'])) {
        $_SESSION['posts'] = array();
    }

    //if $posts is array, let push new $post
    if (is_array($_SESSION['posts'])) {
        array_push($_SESSION['posts'], $post);
    }

    header("Location: ../admin/posts.php");
}

//clear data
if (isset($_POST['clear'])) {
    $_SESSION['posts'] = array();
    header("Location: ../admin/posts.php");

}

// var_dump($_SESSION['posts']);