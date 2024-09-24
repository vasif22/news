<?php
$title="Əsas səhifə";
$image="test";
require "./frontend/layouts/header.php";
require "./frontend/layouts/topBar.php";
require "./config/db.php";






$limit = 2;

if (isset($_GET['page']) && $_GET['page'] != 1) {
    $page   = $_GET['page'] + 1;
    $offset = ($_GET['page'] - 1) * $limit;
}else{
    $page   = 2;
    $offset = 0;
}


$sql = "SELECT posts.*, categories.name as category_name, categories.id as category_id
FROM posts LEFT JOIN categories 
ON categories.id = posts.category_id ORDER BY posts.id DESC LIMIT $limit OFFSET $offset";

$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

           <?php foreach($posts as $post){ ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="./post.php?id=<?= $post['id'] ?>">
                    <h2 class="post-title"><?= $post['title'] ?></h2>
                    <img width="600" src="<?= $site_url. $post['image'] ?>" class="post-subtitle" />
                </a>
                <p class="post-meta">
                    Kateqoria:
                    <a href="#!"><?= $post['category_name'] ?></a>
                   
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php  } ?>

            <!-- Pager-->
            <div class="d-flex 
            <?php if(isset($_GET['page']) && (int)$_GET['page'] !== 1) {?>
            justify-content-between
            <?php } else { ?>
                justify-content-end
            <?php } ?>
            
            mb-4">
                <?php if(isset($_GET['page']) && (int)$_GET['page'] !== 1){ ?>
                <a class="btn btn-primary text-uppercase" 
            href="<?= $site_url . "?page=" . $_GET['page'] - 1 ?>">Previous Posts</a>
              <?php  }?>
            <a class="btn btn-primary text-uppercase" 
            href="<?= $site_url . "?page=$page" ?>">Older Posts →</a>
           </div>
        </div>
    </div>
</div>

     <?php
require "./frontend/layouts/footer.php";
?>