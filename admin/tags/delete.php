<?php 
require  "../../config/db.php";

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM tags WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php");
}else {
    echo "Validation error";
}

?>