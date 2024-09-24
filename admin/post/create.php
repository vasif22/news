<?php
require "../layouts/header.php";
$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM tags");
$stmt->execute();
$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
			<main class="content">
				<div class="container-fluid">
			
					<div class="row">
						<div class="col-12">
							<div class="card">
                            <div class="card-body">
									<form action="./store.php" method="post" enctype="multipart/form-data">
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Title</label>
											<div class="col-sm-10">
												<input type="text" name="title" class="form-control" placeholder="Title">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Categories</label>
											<div class="col-sm-10">
												<select class="form-control" name="category_id">
													<option>SElect Category</option>
													<?php foreach($categories as $cat) { ?>
														<option value="<?= $cat['id']?>"><?= $cat['name'] ?></option>
												   <?php } ?>
												</select>
												
											</div>
										</div>
										
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Description</label>
											<div class="col-sm-10">
												<textarea name="description" class="form-control"></textarea>
												
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Image</label>
											<div class="col-sm-10">
												<input type="file" name="image" class="form-control" placeholder="Title">
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Tags</label>
											<div class="col-sm-10">
												<select class="form-control" name="tags[]" multiple>
												
													<?php foreach($tags as $tag) { ?>
														<option value="<?= $tag['id']?>"><?= $tag['name'] ?></option>
												   <?php } ?>
												</select>
												
											</div>
										</div>
						
										<div class="mb-3 row">
											<div class="col-sm-10 ms-sm-auto">
												<button type="submit" class="btn btn-primary">Submit</button>
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