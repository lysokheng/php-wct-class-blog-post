<?php
require_once '../models/Post.php';

// Start PHP session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['auth'])) {
    header("Location: ../index.php");
    exit();
}

$posts = $GLOBALS['posts'];
// Query all posts from table

if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post($_POST['title'], $_POST['content'], $_POST['image']);
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->image = $_POST['image'];

    if (!isset($posts)) {
        $posts = array();
    }

    if (is_array($posts)) {
        array_push($posts, $post);
    }

    // header("Location: ../admin/posts.php");
}

var_dump($posts);