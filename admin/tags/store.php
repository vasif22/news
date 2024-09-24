<?php 
require  "../../config/db.php";

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $stmt = $conn->prepare("INSERT INTO tags (name) VALUES (?)");
    $stmt->execute([$_POST['name']]);
    header("Location: index.php");
}else {
    echo "Validation error";
}

?>