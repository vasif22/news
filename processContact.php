<?php 
require "./config/db.php";
session_start();

if (isset($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['description'],)
    && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])
    && !empty($_POST['description'])
) 
{
    $stmt = $conn->prepare("INSERT INTO contacts (name,email,phone,description) 
    VALUES (:name,:email,:phone,:description)");
    $_SESSION['message_success'] = "Mesajınız uğurla göndərildi";
    
    $stmt->execute($_POST);
    
    header("Location: contact.php");

   
}else {
    echo "Validation error";
}

?>