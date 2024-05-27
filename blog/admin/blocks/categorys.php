<?php
    $cat_query = "SELECT * FROM categorys ORDER BY category_id";
    $cat_result = mysqli_query($conn, $cat_query);
    // print_r($cat_result);
?>
<h1>Categories</h1>
<div class="categories">
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created_At</th>
            <th>Edti</th>
            <th>Delete</th>
        </tr>
        <?php
            while($cat_records = mysqli_fetch_assoc($cat_result)){

            // $cat_records = mysqli_fetch_assoc($cat_result);
            // $cat_records = mysqli_fetch_assoc($cat_result);
            // echo "<pre>";
            // print_r($cat_records);
            // echo "</pre>";
        ?>
        <tr>
            <td><?=$cat_records['category_id']?></td>
            <td><?=$cat_records['title']?></td>
            <td><?=$cat_records['description']?></td>
            <td><?=$cat_records['created_at']?></td>
            <td><a href="?edit=<?=$cat_records['category_id']?>">Edit</a></td>
            <td><a href="?drop=<?=$cat_records['category_id']?>">Delete</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>