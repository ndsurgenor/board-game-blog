<?php

if (isset($_POST["submit"])) {
    $post_category_id = $_POST["post_category_id"];
    $post_title = $_POST["post_title"];
    $post_author = $_POST["post_author"];
    $post_date = date("d-m-y");
    $post_image = $_FILES["post_image"]["name"];
    $post_image_temp = $_FILES["post_image"]["temp_name"];
    $post_content = $_POST["post_content"];
    $post_tags = $_POST["post_tags"];
    $post_comment_count = 4;
    $post_status = $_POST["post_status"];
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id=""></select>

    </div>


    <div class="form-group">
        <label for="users">Users</label>
        <select name="post_user" id=""></select>

    </div>

    <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->

    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10">
         </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Publish Post">
    </div>

</form>