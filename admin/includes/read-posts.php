<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Post ID</th>
            <th>Cat ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Com Count</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        <?php // Read posts and display in table
        $queryTable = "SELECT * FROM posts";
        $queryPosts = mysqli_query($connection, $queryTable);

        while ($row = mysqli_fetch_assoc($queryPosts)) {
            $post_id = $row["post_id"];
            $post_cat_id = $row["post_category_id"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_date = $row["post_date"];
            $post_image = $row["post_image"];
            $post_content = $row["post_content"];
            $post_tags = $row["post_tags"];
            $post_com_count = $row["post_comment_count"];
            $post_status = $row["post_status"];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_cat_id}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><img width='100' src='../images/{$post_image}'></td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_com_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><a href='categories.php?edit={$post_id}'>
                <button class='btn btn-warning btn-sm'>Edit</button></a></td>";
            echo "<td><a href='categories.php?delete={$post_id}'>
                <button class='btn btn-danger btn-sm'>Delete</button></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>