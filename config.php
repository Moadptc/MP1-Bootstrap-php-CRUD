<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>

<?php

$stmt = $db->prepare("select * from config");
$stmt->execute();
$row = $stmt->fetch();

?>

	<section class="config my-5">
		<div class="container">


			<a href="index.php" class="btn btn-light border my-4">
				<i class="fas fa-arrow-left"></i> &nbsp; la liste
			</a>

			<div class="row">
				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
							<h4>Configuration</h4>
						</div>

						<div class="card-body">
							<form method="post">

								<div class="form-group">
									<label for="nom">Adresse</label>
									<input type="text" name="adresse" value="<?= $row['adresse'] ?>"
									       id="adresse" class="form-control">
								</div>

								<div class="form-group">
									<label for="prenom">telephone</label>
									<input type="text" name="telephone" value="<?= $row['telephone'] ?>"
									       id="telephone" class="form-control">
								</div>

								<div class="form-group">
									<label for="email">email</label>
									<input type="text" name="email" value="<?= $row['email'] ?>"
									       id="email" class="form-control">
								</div>


								<div class="form-group">
									<button class="btn btn-success
                                form-control text-center" name="update_config">
										Enregistrer
									</button>
								</div>

							</form>

							<?php

							if(isset($_POST['update_config']))
							{
								$adresse = $_POST['adresse'];
								$telephone = $_POST['telephone'];
								$email = $_POST['email'];


								$stmt = $db->prepare("update config set
                                    adresse = :adresse,
                                    telephone = :telephone,
                                    email = :email");

								$stmt->bindparam(":adresse",$adresse);
								$stmt->bindparam(":telephone",$telephone);
								$stmt->bindparam(":email",$email);

								$stmt->execute();

//print_r($stmt);

								echo "<meta http-equiv='refresh' content='0;url=config.php' >";



							}

							?>
						</div>

					</div>
				</div>


				<div class="col-md-3">
					<h3>Logo</h3>
					<img src="upload/config/<?= $row['logo'] ?>" style="height: 130px;width: 100%"
					     alt="Pic Avatar"
					     class="d-block img-fluid mb-3">
					<form method="post" enctype="multipart/form-data">

						<div class="form-group">

							<input type="file"  name="img">


							<button class="btn btn-primary form-control mt-2"
							        name="edit_logo">
								<i class="fas fa-image"></i> Modifier le Logo
							</button>

							<button class="btn btn-dark form-control mt-2"
							        name="print-infos">
								<i class="fas fa-print"></i> imprimer les information
							</button>

						</div>


					</form>

				</div>



			</div>
		</div>
	</section>


<?php

if(isset($_POST['edit_logo']))
{

/*-------------- img process ----------------------*/


if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
$image = $_FILES["img"]["name"];

if($_FILES["img"]["size"] <= 1000000){

$ext = array("jpg","png");

$extension = pathinfo($_FILES["img"]["name"]);
//print_r($extension) ;
$nameFile = date("F_j_Y_g_i_s_a").'_' . $extension['basename'];


// print_r($extension);

if(in_array($extension["extension"], $ext)){

move_uploaded_file($_FILES["img"]["tmp_name"] ,
"upload/config/".$nameFile);

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
	$img = $row['logo'];
}

if($img != 'logo_pdf.png')
{
unlink('upload/config/'.$row['logo']);
}

$stmt = $db->prepare("update config set
logo = :logo");

$stmt->bindparam(":logo",$img);

$stmt->execute();

//print_r($stmt);

echo "<meta http-equiv='refresh' content='0;url=config.php' >";

}

if(isset($_POST['print-infos'])){

	$adresse = $row['adresse'];
	$telephone = $row['telephone'];
	$email = $row['email'];

header
("location:print_company.php?&adresse=$adresse&telephone=$telephone&email=$email");

}


?>


<?php include 'includes/footer.php'; ?>
