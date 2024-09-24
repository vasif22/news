<?php

require "../layouts/header.php";

$stmt=$conn->prepare("SELECT * FROM users");
$stmt->execute();
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<main class="content">

<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            İstifadəçilər
        </h1>
        </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
            
                <div class="card-body">
                    <a href="creat.php" class="btn btn-success">İstifadəçi əlavə et</a>
                <table class="table table-reponsive">
                <style>
              th  {
                    padding-right: 20px;
                }

                    </style>
                
                <table>
                  
  <tr>
    <th>Name</th>
    <th>E-mail</th >
    
    <th>image</th>
  </tr>
  <?php
  foreach($users as $user){
  ?>
  <tr>
    <td><?=$user['name']?></td>
    <td><?=$user['email']?></td>
    
    <td><img width="100" src="<?= $site_url   . $user['image']?>" /></td>
  <td>
  <a href="delete.php?id=<?=$user['id']?>" class="btn btn-danger">sil  </a>
  <a href="edit.php?id=<?=$user['id']?>" class="btn btn-primary" >deyis  </a>

  </td>

    
  </tr>
  <?php } ?>
</table>

































<?php
require "../layouts/footer.php";

    ?>            