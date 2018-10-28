<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>



<?php

if (isset($_GET['id'])):
	$id = $_GET['id'];
	extract($etudiant->getId($id));
endif;

?>

	<section class="mt-3">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 py-3 table-section">

                    <a href="index.php" class="btn btn-light border mb-4">
                        <i class="fas fa-arrow-left"></i> &nbsp; la liste
                    </a>

					<div class="card">
						<div class="card-header">
							<?= $nom . ' ' . $prenom ?>
						</div>
						<div class="card-body">
							<h5 class="card-title font-weight-bold">
								Les Informations d'etudiant
							</h5>
							<div class="card-text">
								<p class="float-left mr-3">
                                    <img style="width:300px; height: 300px" class="img-thumbnail"
                                         src="upload/profile/<?= $img ?>" alt="profile pic">
								</p>
								<p>
									<span class="font-weight-bold">Email : </span>
									<?= $email ?>
								</p>
								<p>
									<span class="font-weight-bold">La note 1 : </span>
									<?= $note1 ?>  <br>
								</p>
								<p>
									<span class="font-weight-bold">La note 2 : </span>
									<?= $note2 ?>  <br>
								</p>
								<p>
									<span class="font-weight-bold">date de naissance : </span>
									<?= $date_de_naissance ?>  <br>
								</p>

							</div>

							<form method="post">
								<button type="submit" name="print" href="#" class="btn btn-secondary">
									<i class="fas fa-print"></i> Imprimer
								</button>
							</form>



						</div>
					</div>

				</div>
			</div>
		</div>

	</section>


<?php


if(isset($_POST['print'])){

header
("location:print.php?id=$id&nom=$nom&prenom=$prenom&email=$email&moyenne=$moyenne&note1=$note1&note2=$note2&date_de_naissance=$date_de_naissance");

}


?>

<?php include 'includes/footer.php'; ?>