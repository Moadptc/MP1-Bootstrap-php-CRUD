<?php ob_start(); ?>
<?php session_start(); ?>
<?php $etudiant->checkAuth(); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>OOP Practice</title>
</head>



<link rel="stylesheet" href="public/css/bootstrap.css">
<link rel="stylesheet" href="public/css/fontawesome-all.min.css">
<link rel="stylesheet" href="public/css/owl.carousel.min.css">
<link rel="stylesheet" href="public/css/owl.theme.default.min.css">
<link rel="stylesheet" href="public/css/ekko-lightbox.css">
<link rel="stylesheet" href="public/css/style.css">

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="index.php">
            <img src="public/img/logo.png" style="width: 100px;"
                 class="img-fluid" alt="logo">
        </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i>
                        ACCUEIL
                        <span class="sr-only">(current)</span></a>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link mx-2" href="parametres_profile.php">
                        <i class="fas fa-user-alt"></i>
                        <?php echo $_SESSION['prenom'] ?>
                    </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link btn btn-primary btn-sm" href="logout.php">
                        Deconnecter
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
				</li>

			</ul>

		</div>
	</div>

</nav>