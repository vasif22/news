<?php
require "../layouts/header.php";

$stmt=$conn->prepare("SELECT * FROM categories ORDER BY id DESC");
$stmt->execute();
$catgories=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<main class="content">

<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            Kategorialar
        </h1>
    
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
            
                <div class="card-body">
                    <a href="creat.php" class="btn btn-success">Yarat</a>
                <table class="table table-reponsive">
                <tr>
                  <th>basliqlar</th>
                  <th>emelyatlar</th>
                </tr>
                <?php 
                foreach ($catgories as $cat){
                
                ?>
                <tr>
                    <td><?=$cat['name']?></td>
                    <td>
                        <a href="edit.php?id=<?=$cat['id']?>" class="btn btn-primary" >Deyis  </a>
                        <a href="delete.php?id=<?=$cat['id']?>" class="btn btn-danger">sil  </a>
                        </td>
                    
                </tr>


<?php } ?>
                </table>
            
                </div>
            </div>
        </div>
    </div>

</div>
</main>
<?php


require "../layouts/footer.php";

?>