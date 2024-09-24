<?php
require "../layouts/header.php";
require  "../../config/db.php";

$stmt = $conn->prepare("SELECT * FROM tags ORDER BY id DESC");
$stmt->execute();
$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Tags
						</h1>
				       
					</div>
					<?php 
					  
					
					?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="card-header">
								<a class="btn btn-success" href="./create.php">Tag yarat</a>
								<table class="table">
									<thead>
										<tr>
											<th style="width:40%;">ID</th>
											<th style="width:25%">Name</th>
								
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($tags as $tag) { ?>
										<tr>
											<td><?= $tag['id'] ?></td>
											<td><?= $tag['name'] ?></td>
									
											<td class="table-action">
												<a href="./edit.php?id=<?= $tag['id'] ?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
												<a href="./delete.php?id=<?= $tag['id'] ?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
