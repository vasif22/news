<?php 
require  "../../config/db.php";

if (isset($_POST['title'],$_POST['description'],$_POST['category_id'],$_FILES['image'],$_POST['tags']) 
&& !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['category_id']) && 
!empty($_POST['tags'])
) {
    $stmt = $conn->prepare("INSERT INTO posts (title,description,category_id,image) VALUES (?,?,?,?)");

    $filePath = "/storage/posts/". rand(0,999999) . $_FILES['image']['name'];

    $fullPath = $_SERVER['DOCUMENT_ROOT'] .  '/news' . $filePath;

    move_uploaded_file($_FILES['image']['tmp_name'],$fullPath);
  
    $_POST['image'] = $filePath;


    $stmt->execute([$_POST['title'], $_POST['description'], $_POST['category_id'], $_POST['image']]);
    $postId = $conn->lastInsertId();

    foreach ($_POST['tags'] as $tag) {
        $stmt = $conn->prepare("INSERT INTO post_tag (post_id,tag_id) VALUES(?,?)");
        $stmt->execute([$postId,$tag]);
    }
    header("Location: index.php");
}else {
    echo "Validation error";
}

?>