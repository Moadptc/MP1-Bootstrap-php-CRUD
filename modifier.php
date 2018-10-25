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

				<form method="post">

                    <div class="form-group">
                        <label for="n">Nom</label>
                        <input type="text" name="nom" class="form-control" id="n"
                               placeholder="Nom" value="<?php echo $nom; ?>">
                    </div>
                    <div class="form-group">
                        <label for="p">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="p"
                               placeholder="Prenom" value="<?php echo $prenom; ?>">
                    </div>
                    <div class="form-group">
                        <label for="e">Email</label>
                        <input type="text" name="email" class="form-control" id="e"
                               placeholder="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input name="password" type="text" class="form-control" id="pass"
                               placeholder="Password" value="<?php echo $password; ?>">
                    </div>

                    <div class="form-group">
                        <label for="note1">Note 1</label>
                        <input name="note1" type="text" class="form-control" id="note1"
                               placeholder="Note 1" value="<?php echo $note1; ?>">
                    </div>
                    <div class="form-group">
                        <label for="note2">Note 2</label>
                        <input name="note2" type="text" class="form-control" id="note2"
                               placeholder="Note 2" value="<?php echo $note2; ?>">
                    </div>
                    <div class="form-group">
                        <label for="note2">Note 2</label>
                        <input name="note2" type="text" disabled class="form-control" id="note2"
                               placeholder="Note 2" value="<?php echo $moyenne; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date de naissance</label>
                        <input name="date_de_naissance" type="date" class="form-control"
                               id="date"
                               placeholder="date de naissance"
                               value="<?php echo $date_de_naissance; ?>">
                    </div>

					<button type="submit" name="update"
					        class="btn text-white btn-warning">
						<i class="fas fa-plus-circle"></i> Modifier
					</button>

					<a href="index.php" class="btn btn-primary">
						<i class="fas fa-home"></i> La Liste Des Etudiants
					</a>
				</form>

			</div>
		</div>
	</div>

</section>

<div class="container">

	<?php

	if (isset($_POST['update'])):

		// creer des variables de formulaire
		extract($_POST);

		$id = $_GET['id'];

		$moyenne = $etudiant->calcMoyenne($note1,$note2);

		if($etudiant->modifierEtudiant($id,$nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance)):
			echo '<div class="alert alert-success">l etudiant a été modifier</div>';
			$etudiant->redirectTo('modifier.php?id='.$id);
		else:
			echo '<div class="alert alert-danger">l etudiant n est pas modifier</div>';
		endif;

	endif;

	?>

</div>


<?php include 'includes/footer.php'; ?>