<?php 
require  "../../config/db.php";



if (isset($_POST['title'],$_POST['description'],$_POST['category_id'],$_FILES['image'],$_POST['tags'],
$_GET['id']
) 
&& !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['category_id']) && 
!empty($_POST['tags'])
) {

    if (empty($_FILES['image']['name'])) {
        $sql = "UPDATE posts SET title=?,description=?,category_id=? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['category_id'], $_GET['id']]);
        
    }else{

        $sql = "UPDATE posts SET title=?,description=?,category_id=?, image=? WHERE id = ?";

        $filePath = "/storage/posts/". rand(0,999999) . $_FILES['image']['name'];

        $fullPath = $_SERVER['DOCUMENT_ROOT'] .  '/news' . $filePath;
    
        move_uploaded_file($_FILES['image']['tmp_name'],$fullPath);;

        $_POST['image'] = $filePath;
        $stmt = $conn->prepare($sql);

        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['category_id'], $_POST['image'], $_GET['id']]);
        
    }



    $stmt = $conn->prepare("DELETE FROM post_tag WHERE post_id = ?");
    $stmt->execute([$_GET['id']]); 


    foreach ($_POST['tags'] as $tag) {
        $stmt = $conn->prepare("INSERT INTO post_tag (post_id,tag_id) VALUES(?,?)");
        $stmt->execute([$_GET['id'],$tag]);
    }

    header("Location: index.php");
}else {
    echo "Validation error";
}

?>
