<?php
    $id = $_GET['edit'];
    $edit_res = mysqli_query($conn, "SELECT * FROM categorys WHERE category_id ='$id'");
    $edit_record = mysqli_fetch_assoc($edit_res);
?>
<form method="post" class="form">
    <div>
        <label for="">სათაური</label>
        <input type="text" name="title" value="<?=$edit_record['title']?>">
        <input type="hidden" name="id" value="<?=$edit_record['category_id']?>">
    </div>
    <div>
        <label for="">აღწერა</label>
        <textarea name="description"><?=$edit_record['description']?></textarea>
    </div>
    <div>
        <button name="edit">რედაქტირება</button>
    </div>
</form>