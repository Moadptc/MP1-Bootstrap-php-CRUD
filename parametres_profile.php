<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>

<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fa fa-user-cog"></i> Modifier Profile</h1>
            </div>
        </div>
    </div>
</header>


<!-- ACTION -->

<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-2 mr-auto">
                <a href="index.php" class="btn btn-light btn-block">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
            <div class="col-md-3 mt-2">
                <a href="#" class="btn btn-success btn-block"
                   data-toggle="modal" data-target="#passwordModal" >
                    <i class="fa fa-lock"></i> Changer le mot de passe
                </a>
            </div>

        </div>
    </div>
</section>


<?php

$id = $_SESSION['id'];
$stmt = $db->prepare("select * from admin where id = :id");
$stmt->bindparam(':id',$id);

$stmt->execute();
$row = $stmt->fetch();

?>

<div class="container">


	<?php



	if(isset($_POST['change_password']))
	{
		$password = $_POST['password'];

		if($password == '')
		{
			$password = $row['password'];
		}

		$stmt = $db->prepare("update admin set
                                    password = :password
                                    WHERE id = :id");

		$stmt->bindparam(":password",$password);
		$stmt->bindparam(":id",$id);

		$stmt->execute();

//print_r($stmt);

		echo '<div class="container my-3 alert alert-warning">
                <i class="fa fa-warning"></i> vous serez redirigé pour vous 
                déconnecter pendant 5 secondes!!
          </div>';

		echo "<meta http-equiv='refresh' content='5;url=logout.php' >";

	}

	?>

    <!-- PROFILE EDIT -->

    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Modifier Profile</h4>
                        </div>

                        <div class="card-body">
                            <form method="post">

                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" value="<?= $row['nom'] ?>"
                                           id="nom" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" name="prenom" value="<?= $row['prenom'] ?>"
                                           id="prenom" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" name="email" value="<?= $row['email'] ?>"
                                           id="email" class="form-control">
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-success
                                form-control text-center" name="update_admin">
                                        Enregistrer
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>


				<?php

				if(isset($_POST['update_admin']))
				{

				    $id = $_SESSION['id'];

					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$email = $_POST['email'];


					$stmt = $db->prepare("update admin set
                                    nom = :nom,
                                    prenom = :prenom,
                                    email = :email
                                    WHERE id = :id");

					$stmt->bindparam(":nom",$nom);
					$stmt->bindparam(":prenom",$prenom);
					$stmt->bindparam(":email",$email);
					$stmt->bindparam(":id",$id);

					$stmt->execute();

//print_r($stmt);

					echo "<meta http-equiv='refresh' content='0;url=parametres_profile.php' >";



				}

				?>

                <div class="col-md-3">
                    <h3>Your Avatar</h3>
                    <img src="upload/profile/<?= $row['img'] ?>" style="height: 230px;width: 100%"
                         alt="Pic Avatar"
                         class="d-block img-fluid mb-3">
                    <form method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <input type="file"  name="img">


                            <button class="btn btn-primary form-control mt-2" name="edit_img">
                                Modifier l' Image
                            </button>

                        </div>

                        <div class="form-group">
                            <button name="delete_img" class="btn btn-danger btn-block">
                                Supprimer l' Image
                            </button>
                        </div>


                    </form>

                </div>

            </div>
        </div>

		<?php

		if(isset($_POST['delete_img']))
		{

			$img = 'etudiant.png';

			$stmt = $db->prepare("update admin set
                                    img = :img
                                    WHERE id = :id");

			$stmt->bindparam(":img",$img);
			$stmt->bindparam(":id",$id);

			$stmt->execute();

//print_r($stmt);

			echo "<meta http-equiv='refresh' content='0;url=parametres_profile.php' >";

		}

		if(isset($_POST['edit_img']))
		{

			/*-------------- img process ----------------------*/


			if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
				$image = $_FILES["img"]["name"];

				if($_FILES["img"]["size"] <= 1000000){

					$ext = array("jpg","png");

					$extension = pathinfo($_FILES["img"]["name"]);
					//print_r($extension) ;
					$nameFile = date("F_j_Y_g_i_s_a").'_' . ($extension['basename']);

					// print_r($extension);

					if(in_array($extension["extension"], $ext)){

						move_uploaded_file($_FILES["img"]["tmp_name"] ,
							"upload/profile/".$nameFile);

					}else{

						echo "this exetension not valide plz chang to jpg or png";

					}
				}
				else{
					echo 'this file is too large';
				}

			}else{
				echo '';
			}

			$img = $nameFile;
			if($img == '')
			{
				$img = $row['img'];
			}

			if ($row['img'] == 'etudiant.png') $row['img'] = null;

			if($img != 'etudiant.png')
			{
				unlink('upload/profile/'.$row['img']);
			}

			$stmt = $db->prepare("update admin set
                                    img = :img
                                    WHERE id = :id");

			$stmt->bindparam(":img",$img);
			$stmt->bindparam(":id",$id);

			$stmt->execute();

//print_r($stmt);

			echo "<meta http-equiv='refresh' content='0;url=parametres_profile.php' >";

		}

		?>
    </section>




    <!-- PASSWORD MODAL -->
    <div id="passwordModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Changer le mot de passe</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="password">mot de passe</label>
                            <input type="password" name="password"
                                   id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cpassword">Confirmer le mot de passe</label>
                            <input type="password" id="cpassword" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Fermer
                        </button>
                        <button class="btn btn-primary"
                                name="change_password" type="submit">
                            Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	</div>


<?php include 'includes/footer.php' ?>

