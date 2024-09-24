<?php  
require "./config/db.php";
$stmt = $conn->prepare("SELECT posts.*, categories.name as category_name, 
GROUP_CONCAT(tags.name) as tags
FROM posts 
LEFT JOIN categories ON categories.id = posts.category_id 
LEFT JOIN post_tag ON post_tag.post_id = posts.id 
LEFT JOIN tags ON tags.id = post_tag.tag_id
WHERE posts.id = ?
GROUP BY posts.id
");
$stmt->execute([$_GET['id']]);
$post =$stmt->fetch(PDO::FETCH_ASSOC);


$title = $post['title'];
$image = $post['image'];

require "./frontend/layouts/header.php";

?>


<!-- Post Content-->

<article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?= $post['description'] ?></p>
     
                        <p>
                            Categoria
                            <a href="post.php"><?= $post['category_name'] ?></a>
                            &middot; Tags
                            <a href="https://www.flickr.com/photos/nasacommons/"><?= $post['tags'] ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </article>

<?php
require "./frontend/layouts/footer.php";
?>