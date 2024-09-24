<?php 
require  "../../config/db.php";

if (isset($_POST['name'], $_GET['id']) && !empty($_POST['name'])) {
    $stmt = $conn->prepare("UPDATE  tags SET name=? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_GET['id']]);
    header("Location: index.php");
}else {
    echo "Validation error";
}

?>