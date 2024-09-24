<?php
require "../layouts/header.php";
require  "../../config/db.php";



?>


<main class="content">
<div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                    <form action="./store.php" method="post">
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-end">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Category name">
                            </div>
                        </div>
        
                        <div class="mb-3 row">
                            <div class="col-sm-10 ms-sm-auto">
                                <button type="submit" class="btn btn-primary">Yarat</button>
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

