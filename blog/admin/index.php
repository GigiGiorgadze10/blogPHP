<?php
    session_start();
    include_once "../connection/conn.php";
    include "blocks/signin.php";
    if(isset($_POST['add'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $add = "INSERT INTO categorys(title, description) VALUES ('$title', '$description')";
        mysqli_query($conn, $add);
    }

    if(isset($_POST['addnews'])){
        $title1 = $_POST['titlenews'];
        $description1 = $_POST['information'];
        $category1 = $_POST['category'];
        $user_id = $_POST['userid'];
        $addnews = "INSERT INTO news(title, information, category_id, user_id) VALUES ('$title1', '$description1', $category1, '$user_id')";
        mysqli_query($conn, $addnews);
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $add = "UPDATE categorys SET title='$title', description='$description' WHERE id='$id'";
        mysqli_query($conn, $add);
        $url = $_SERVER['PHP_SELF'];
        header("location: $url"); 
    }

    if(isset($_GET['drop'])){
        $id = $_GET['drop'];
        $drop = "DELETE from categorys WHERE id = '$id'";
        mysqli_query($conn, $drop);
        $url = $_SERVER['PHP_SELF'];
        header("location: $url"); 
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(!isset($_SESSION['name'])){
            include "blocks/login_form.php";
        }else{
            include "blocks/main.php";
        }
    ?>
</body>
</html>