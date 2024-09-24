<?php
require  "../../config/db.php";
require "../layouts/header.php";

$stmt = $conn->prepare("SELECT posts.*, GROUP_CONCAT(tags.name) as tags, c.name as category
   FROM posts LEFT JOIN categories as c ON c.id = posts.category_id
  LEFT JOIN post_tag ON post_tag.post_id = posts.id LEFT JOIN tags ON tags.id = post_tag.tag_id
  GROUP BY posts.id
  ORDER BY posts.id DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Posts
						</h1>
				       
					</div>
					<?php 
					  
					
					?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="card-header">
								<a class="btn btn-success" href="./create.php">Create Posts</a>
								<table class="table">
									<thead>
										<tr>
											<th style="width:15%;">ID</th>
											<th style="width:15%">Name</th>
											<th style="width:15%">Category</th>
											<th style="width:15%">Image</th>
											<th style="width:15%">Tags</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($posts as $post) { ?>
										<tr>
											<td><?= $post['id'] ?></td>
											<td><?= $post['title'] ?></td>
											<td><?= $post['category'] ?></td>
											<td><img src="<?= $site_url . $post['image'] ?>" width="25" /></td>
											<style>
    .masthead {
        background-size: 150%; /* Şəkilin ölçüsünü kiçiltmək üçün */
        background-position: center; /* Şəkilin mərkəzləşdirilməsi */
        background-repeat: no-repeat; /* Şəkilin təkrarlanmaması */
        padding: 10rem 0; /* Üst və alt boşluq əlavə etmək */
        text-align: center; /* Mətnin mərkəzləşdirilməsi */
    }
</style>

											<td><?= $post['tags'] ?></td>
											<td class="table-action">
												<a href="./edit.php?id=<?= $post['id'] ?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
												<a href="./delete.php?id=<?= $post['id'] ?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
											</td>
										</tr>
								        <?php } ?>					
									</tbody>
								</table>
								</div>
								<div class="card-body">
									<div class="my-5">&nbsp;</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
<?php 
require "../layouts/footer.php";

?>