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

//store data
if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post();
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->image = $_POST['image'];

    if (!isset($_SESSION['posts'])) {
        $_SESSION['posts'] = array();
    }

    if (is_array($_SESSION['posts'])) {
        array_push($_SESSION['posts'], $post);
    }

    header("Location: ../admin/posts.php");
}

//clear data
if (isset($_POST['clear'])) {
    $_SESSION['posts'] = array();
}

// var_dump($_SESSION['posts']);