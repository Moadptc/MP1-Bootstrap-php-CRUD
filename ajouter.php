<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>



<section class="mt-3">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 py-3 table-section">

				<form method="post">

					<div class="form-group">
						<label for="n">Nom</label>
						<input type="text" name="nom" class="form-control" id="n"
						       placeholder="Nom">
					</div>
					<div class="form-group">
						<label for="p">Prenom</label>
						<input type="text" name="prenom" class="form-control" id="p"
						       placeholder="Prenom">
					</div>
					<div class="form-group">
						<label for="e">Email</label>
						<input type="text" name="email" class="form-control" id="e"
						       placeholder="email">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input name="password" type="text" class="form-control" id="pass"
						       placeholder="Password">
					</div>

					<div class="form-group">
						<label for="note1">Note 1</label>
						<input name="note1" type="text" class="form-control" id="note1"
						       placeholder="Note 1">
					</div>
					<div class="form-group">
						<label for="note2">Note 2</label>
						<input name="note2" type="text" class="form-control" id="note2"
						       placeholder="Note 2">
					</div>
					<div class="form-group">
						<label for="date">Date de naissance</label>
						<input name="date_de_naissance" type="date" class="form-control"
                               id="date"
						       placeholder="date de naissance">
					</div>

					<button type="submit" name="ajouter" class="btn btn-primary">
						<i class="fas fa-plus-circle"></i> Ajouter
					</button>

					<a href="index.php" class="btn btn-primary">
						<i class="fas fa-home"></i> La Liste
					</a>
				</form>

			</div>
		</div>
	</div>

</section>

<div class="container">

<?php

if (isset($_POST['ajouter'])):

	// creer des variables de formulaire
	extract($_POST);

    $moyenne = $etudiant->calcMoyenne($note1,$note2);


	if ($etudiant->ajouterEtudiant($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance)):
		echo '<div class="alert alert-success">l etudiant a été ajouté</div>';
    else:
	    echo '<div class="alert alert-danger">Probleme d insertion</div>';
    endif;


endif;

?>

</div>



<?php include 'includes/footer.php'; ?>


