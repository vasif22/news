<?php
require "../layouts/header.php";
require  "../../config/db.php";

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM post_tag WHERE post_id = ?");
    $stmt->execute([$_GET['id']]);
    $postTags = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$postTags = array_column($postTags, 'tag_id');
	

	$stmt = $conn->prepare("SELECT * FROM categories");
	$stmt->execute();
	$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM tags");
	$stmt->execute();
	$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
			<main class="content">
				<div class="container-fluid">
			
					<div class="row">
						<div class="col-12">
							<div class="card">
                            <div class="card-body">
							<form action="./update.php?id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data">
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Title</label>
											<div class="col-sm-10">
												<input value="<?= $post['title'] ?>" type="text" name="title" class="form-control" placeholder="Title">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Categories</label>
											<div class="col-sm-10">
												<select class="form-control" name="category_id">
													<option>SElect Category</option>
													<?php foreach($categories as $category) { ?>
														<option 
														<?php if ($post['category_id'] === $category['id']) {
															echo "selected";
														} ?>
														value="<?= $category['id']?>"><?= $category['name'] ?></option>
												   <?php } ?>
												</select>
												
											</div>
										</div>
										
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Description</label>
											<div class="col-sm-10">
												<textarea name="description" class="form-control"><?= $post['description'] ?></textarea>
												
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Image</label>
											<div class="col-sm-10">
												<input type="file" name="image" class="form-control" placeholder="Title">
												<img class="mt-2" src="<?= $baseUrl . $post['image'] ?>" width="100" />
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Tags</label>
											<div class="col-sm-10">
												<select class="form-control" name="tags[]" multiple>
												
													<?php foreach($tags as $tag) { ?>
														<option 
														<?php 
														  if(in_array($tag['id'],$postTags)){
																echo "selected";
														  }
														?>
														value="<?= $tag['id']?>"><?= $tag['name'] ?></option>
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