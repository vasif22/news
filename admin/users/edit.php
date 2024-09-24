<?php
require "../../config/db.php";
require "../layouts/header.php";


if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

			<main class="content">
				<div class="container-fluid">
			
					<div class="row">
						<div class="col-12">
							<div class="card">
                            <div class="card-body">
							<form action="./update.php?id=<?= $user['id'] ?>" method="post">
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Name</label>
											<div class="col-sm-10">
												<input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" placeholder="Name">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Email</label>
											<div class="col-sm-10">
												<input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Email">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-end">Password</label>
											<div class="col-sm-10">
												<input type="password" name="password" class="form-control" placeholder="Password ">
											</div>
										</div>
						
										<div class="mb-3 row">
											<div class="col-sm-10 ms-sm-auto">
												<button type="submit" class="btn btn-primary">Dəyiş</button>
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