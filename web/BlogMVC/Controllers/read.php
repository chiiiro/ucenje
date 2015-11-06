<?php

include_once "../includes/config.php";
include_once "../Template.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Get id from querystring
    $id = $_GET['id'];

    $username = $_SESSION['username'];

    $post = PostRepository::getById($id);

    if($post['username'] !== $username) {
        redirect("404.php");
    }

} else {

    // Redirect to site root
    redirect("user_index.php");
}

$readTemplate = Template::create("read", array(
    "post" => $post
));

echo Template::create("main", array(
    "pageTitle" => "User post",
    "body" => $readTemplate->render()
));