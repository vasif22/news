<?php
require "../../config/db.php";

if (
    isset($_POST['name'],$_POST['email'],$_POST['password'])
    && !empty($_POST['name'])  && !empty($_POST['email'])

) {
    if (!empty($_POST['password'])) {
        $sql = "UPDATE  users SET name=:name, email=:email, password=:password WHERE id = :id";
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

    }else {
        $sql = "UPDATE  users SET name=:name, email=:email WHERE id = :id";
        unset($_POST['password']);
    }

    $_POST['id'] = $_GET['id'];
   

    $stmt = $conn->prepare($sql);
    $stmt->execute($_POST);

    header("Location: index.php");
}else {
    echo "Validation error";
}



?>