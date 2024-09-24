<?php
require "./config/db.php";
$pageId = $_GET['page_id'];
$stmt = $conn->prepare("SELECT * FROM pages WHERE id = ?");
$stmt->execute([$pageId]);
$myPage = $stmt->fetch(PDO::FETCH_ASSOC);
$title = $myPage['name'];
$image = $myPage['image'];

require "./frontend/layouts/header.php"
?>

<main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?= $myPage['description'] ?></p>
                    
                    </div>
                </div>
            </div>
        </main>
<?php
require "./frontend/layouts/footer.php"
?>