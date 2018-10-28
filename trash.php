<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>


<section class="mt-3">
	<div class="container">
		<div class="row">



			<div class="col-lg-12 py-3 table-section">

                <a href="index.php" class="btn btn-light border mb-4">
                    <i class="fas fa-arrow-left"></i> &nbsp; la liste
                </a>

                <table class="table table-bordered table-responsive-sm">
					<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Email</th>
						<th>Mot de passe</th>
						<th>Note 1</th>
						<th>Note 2</th>
						<th>Moyenne</th>
						<th>Date de Naissance</th>
						<th>Date de Creation</th>
						<th scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>

					<?php


					$etudiant->trashed();

					?>


					</tbody>
				</table>

			</div>
		</div>
	</div>

</section>


<?php

if(isset($_POST['restore'])):

	$id = $_POST['id'];
	$stmt = $db->
	prepare('select * from trash where id=:id');
	$stmt->bindparam(':id',$id);

	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_OBJ);


	$nom = $row->nom;
	$prenom = $row->prenom;
	$email = $row->email;
	$password = $row->password;
	$note1 = $row->note1;
	$note2 = $row->note2;
	$moyenne = $row->moyenne;
	$date_de_naissance = $row->date_de_naissance;
	$img = $row->img;


	$etudiant->ajouterEtudiant($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance,$img);

	$etudiant->restoreTrash($id);

	$etudiant->redirectTo('index.php');

endif;

?>


<?php include 'includes/footer.php'; ?>




