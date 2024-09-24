<?php
require "../../config/db.php";



if (isset($_POST['name'],$_POST['email'],$_POST['password'], $_FILES['image'])
 && !empty($_POST['name'])  && !empty($_POST['email'])  && !empty($_POST['password'])
 
 ) 
 {
    $stmt = $conn->prepare("INSERT INTO users (name,email,password, image) VALUES (:name,:email,:password, :image)");
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
  
    
    $filePath =  '/storage/users/' . rand(999, 999999) . $_FILES['image']['name'];
    $fullPath = $_SERVER['DOCUMENT_ROOT']. '/news' . $filePath;
    
    $_POST['image']    = $filePath;

    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
        $stmt->execute($_POST);
        header("Location: index.php");
    }else{
        echo "Image could not be uploadded";
    }
  
}else {
    
    echo "Validation error";
}
?>

    

