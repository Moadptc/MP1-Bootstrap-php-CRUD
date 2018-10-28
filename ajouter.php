<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>


<section class="mt-3">
	<div class="container">


        <a href="index.php" class="btn btn-light border my-4">
            <i class="fas fa-arrow-left"></i> &nbsp; la liste
        </a>

		<div class="row">

			<div class="col-lg-12 py-3 table-section">

				<form method="post" id="registration-form" enctype="multipart/form-data">

					<div class="form-group">
						<label for="n">Nom</label>
						<input type="text" name="nom" data-validation="length alphanumeric"
                               data-validation-length="min4" class="form-control" id="n"
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
					<div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
					</div>

                    <div class="form-group">
                        <label for="cap" class="font-weight-bold">
                            Entrez les trois caracteres noire
                        </label>
                        <img src="captcha.php" class="my-1" alt="captcha image" style="width: 120px">
                        <input type="text" name="captcha" size="3″
                        maxlength="3″ class="form-control">
                    </div>

					<?php
                    // captcha

							//CAPTHCA is valid; proceed the message: save to database, send by e-mail …


					?>

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

if(isset($_POST["captcha"]))
if($_SESSION["captcha"]==$_POST["captcha"])
{

if (isset($_POST['ajouter'])):

	// creer des variables de formulaire
	extract($_POST);



    $moyenne = $etudiant->calcMoyenne($note1,$note2);

	/*-------------- img process ----------------------*/


	if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
		$image = $_FILES["img"]["name"];

		if($_FILES["img"]["size"] <= 1000000){

			$ext = array("jpg","png");

			$extension = pathinfo($_FILES["img"]["name"]);
			//print_r($extension) ;
			$nameFile = date("F_j_Y_g_i_s_a").'_'.($extension['basename']);

			// print_r($extension);

			if(in_array($extension["extension"], $ext)){

				move_uploaded_file($_FILES["img"]["tmp_name"] ,
					"upload/profile/" .$nameFile);

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

	/*-------------- img process ----------------------*/


	if ($etudiant->ajouterEtudiant($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance,$img)):
		echo '<div class="alert alert-success">l etudiant a été ajouté</div>';
    else:
	    echo '<div class="alert alert-danger">Probleme d insertion</div>';
    endif;


endif;

}
else
{
	echo '<div class="alert alert-danger">
                                    CAPTHCA non Validé
                                    </div>';
}

?>

</div>



<?php include 'includes/footer.php'; ?>


