<?php

require "../layouts/header.php";





?>
<main class="content">
<div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                    <form action="./store.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-end">USER</label>
                            <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="İstifadəçi adı">
                            <input type="text" name="email" class="form-control" placeholder="E-poçt">
                            <input type="password" name="password" class="form-control" placeholder="Şifrə">
                            <input type="file" name="image" class="form-control" placeholder="image">
                            </div>
                        </div>
        
                        <div class="mb-3 row">
                            <div class="col-sm-10 ms-sm-auto">
                                <button type="submit" class="btn btn-primary">Əlavə Et</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</main>

<?php  
require "../layouts/footer.php";

?>
