<?php

if (isset($_POST["submit"])) {
    $post_category_id = $_POST["post_category_id"];
    $post_title = $_POST["post_title"];
    $post_author = $_POST["post_author"];
    $post_date = date("d-m-y");
    $post_image = $_FILES["post_image"]["name"];
    $post_image_temp = $_FILES["post_image"]["tmp_name"];
    $post_content = $_POST["post_content"];
    $post_tags = $_POST["post_tags"];
    $post_comment_count = 4;
    $post_status = $_POST["post_status"];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts (
        post_category_id,
        post_title,
        post_author,
        post_date,
        post_image,
        post_content,
        post_tags,
        post_comment_count,
        post_status
        ) ";

    $query .= "VALUES (
        '{$post_category_id}',
        '{$post_title}',
        '{$post_author}',
        now(),
        '{$post_image}',
        '{$post_content}',
        '{$post_tags}',
        '{$post_comment_count}',
        '{$post_status}'
        )";

    $createPost = mysqli_query($connection, $query);

    if (!$createPost) {
        die("QUERY FAILED" . mysqli_error($connection));
    };
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="category">Post Category ID</label>
        <input type="text" class="form-control" name="post_category_id" id=""></select>

    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
         </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Publish Post">
    </div>

</form>