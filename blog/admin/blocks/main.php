<main>
    <nav>
        <ul>
            <li><a href="index.php">DeshBoard</a></li>
            <li><a href="?add">Add Category</a></li>
            <li><a href="?addnews">Add News</a></li>
            <li><a href="?sign=out">Sign Out</a></li>
        </ul>
        <div class="info">
            <?php
                echo $_SESSION['name'];
                echo "<br>";
                echo $_SESSION['lastname'];
            ?>
        </div>
    </nav>
    <div class="content">
        <?php
            if(isset($_GET['edit'])){
                include "edit.php";
            }else if(isset($_GET['add'])){
                include "add.php";
            }else if(isset($_GET['addnews'])){
                include "addnews.php";
            }else{
                include "categorys.php";
            }
        ?>
    </div>
</main>