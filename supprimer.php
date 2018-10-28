<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>



<section class="mt-3">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 py-3 table-section">

                <div class="alert alert-danger font-weight-bold">
                    Voulez-vous Vraimant Supprimer l element
                </div>

				<table class="table table-bordered table-responsive-sm">
					<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Note 1</th>
                        <th>Note 2</th>
                        <th>Moyenne</th>
                        <th>Date de Naissance</th>
					</tr>
					</thead>
					<tbody>

					<?php

                    $id = $_GET['id'];
					$stmt = $db->
                    prepare('select * from etudiant where id=:id');
					$stmt->bindparam(':id',$id);

					$stmt->execute();
					$row = $stmt->fetch();

					?>

					<tr>
                        <th scope="row">1</th>
                        <td><?php echo $row['nom'] ?></td>
                        <td><?php echo $row['prenom'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['note1'] ?></td>
                        <td><?php echo $row['note2'] ?></td>
                        <td><?php echo $row['moyenne'] ?></td>
                        <td><?php echo $row['date_de_naissance'] ?></td>

					</tr>


					</tbody>
				</table>

                <form method="post">
                    <button name="delete" type="submit" class="btn btn-danger">
                        <i class="fas fa-check"></i> Oui
                    </button>
                    <a href="index.php" class="btn btn-success">
                        <i class="fas fa-times"></i> Non
                    </a>
                </form>


			</div>
		</div>
	</div>

</section>

<?php

if(isset($_POST['delete'])):

	$id = $_GET['id'];

	$nom = $row['nom'];
	$prenom = $row['prenom'];
	$email = $row['email'];
	$password = $row['password'];
	$note1 = $row['note1'];
	$note2 = $row['note2'];
	$moyenne = $row['moyenne'];
	$date_de_naissance = $row['date_de_naissance'];
	$img = $row['img'];


	$etudiant->ajouterEtudiantTrash($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance,$img);

	$etudiant->delete($id);

	$etudiant->redirectTo('index.php');

endif;

?>

<?php include 'includes/footer.php'; ?>
