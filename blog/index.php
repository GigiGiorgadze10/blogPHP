<?php
include "./connection/conn.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>blog</title>
</head>
<body>
    <main>
        <?php
        $nav_q = "SELECT category_id, title FROM categorys"; 
        $nav_result = mysqli_query($conn, $nav_q);
        if (!$nav_result) {
            die("Query failed: " . mysqli_error($conn));
        }
        $navigation = mysqli_fetch_all($nav_result, MYSQLI_ASSOC);

        $selected_category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;

        if ($selected_category_id) {
            $news_q = "SELECT news_id, title, information, created_at FROM news WHERE category_id = $selected_category_id";
        } else {
            $news_q = "SELECT news_id, title, information, created_at FROM news";
        }
        $news_result = mysqli_query($conn, $news_q);
        if (!$news_result) {
            die("Query failed: " . mysqli_error($conn));
        }
        $newsfromdata = mysqli_fetch_all($news_result, MYSQLI_ASSOC);
        ?>
        <div class="navbar">
            <h1>Categories</h1>
            <ul>
                <?php
                foreach($navigation as $nav){
                ?>
                <li><a href="?category_id=<?=$nav['category_id']?>"><?=$nav['title']?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="mtavari">
            <h1>News</h1>
            <ul>
                <?php
                foreach($newsfromdata as $news){
                ?>
                    <h2><?=$news['title']?></h2>
                    <p><?=$news['information']?></p>
                    <small>Published on: <?=$news['created_at']?></small>
                <?php
                }
                ?>
            </ul>
        </div>
    </main>
</body>
</html>
