<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>


<script src="public/js/chart.min.js"></script>

<section class="dashboard my-5">
	<div class="container">

		<a href="index.php" class="btn btn-light border my-4">
			<i class="fas fa-arrow-left"></i> &nbsp; la liste
		</a>

		<div class="note1">
			<h2>Les 1er Notes</h2>
			<div class="my-3 border p-5">

				<canvas id="mychart"></canvas>
				<?php
				$stmt=$db->prepare("SELECT * from etudiant");
				$stmt->execute();

				$arr_nom=[];
				$arr_note1=[];
				$arr_note2=[];
				$arr_moyenne=[];
				while ($row=$stmt->fetch()) {
					extract($row);

					// $nom = $row['nom']

					$arr_nom[]=$nom;
					$arr_note1[]=$note1;
					$arr_note2[]=$note2;
					$arr_moyenne[]=$moyenne;
				}
				// outpout array
//				echo json_encode($notes);
//				echo json_encode($arr_note1);


				?>


				<script>
                    var ctx = document.getElementById("mychart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($arr_nom) ?>,
                            datasets: [{
                                label: 'La note est',
                                data: <?php echo json_encode($arr_note1) ?>,
                                backgroundColor:'#f9ad8d',
                                borderColor: '#f47645',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
				</script>

			</div>
		</div>

		<div class="note2">
			<h2>Les 2eme Notes</h2>
			<div class="my-3 border p-5">

				<canvas id="mychart2"></canvas>
				<?php
				$stmt2=$db->prepare("SELECT * from etudiant");
				$stmt2->execute();

				$arr_nom=[];
				$arr_note1=[];
				$arr_note2=[];
				$arr_moyenne=[];
				while ($row2=$stmt2->fetch()) {
					extract($row2);

					$arr_nom[]=$nom;
					$arr_note1[]=$note1;
					$arr_note2[]=$note2;
					$arr_moyenne[]=$moyenne;
				}
				// outpout array
				//				echo json_encode($notes);
				//				echo json_encode($arr_note1);


				?>


				<script>
                    var ctx = document.getElementById("mychart2").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($arr_nom) ?>,
                            datasets: [{
                                label: 'La 2eme note est',
                                data: <?php echo json_encode($arr_note2) ?>,
                                backgroundColor:'#75bcf9',
                                borderColor: '#4c8cd5',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
				</script>

			</div>
		</div>

		<div class="moyenne">
			<h2>La Moyenne des notes</h2>
			<div class="my-3 border p-5">

				<canvas id="mychart3"></canvas>
				<?php
				$stmt3=$db->prepare("SELECT * from etudiant");
				$stmt3->execute();

				$arr_nom=[];
				$arr_note1=[];
				$arr_note2=[];
				$arr_moyenne=[];
				while ($row3=$stmt3->fetch()) {
					extract($row3);

					$arr_nom[]=$nom;
					$arr_note1[]=$note1;
					$arr_note2[]=$note2;
					$arr_moyenne[]=$moyenne;
				}
				// outpout array
				//				echo json_encode($notes);
				//				echo json_encode($arr_note1);


				?>


				<script>
                    var ctx = document.getElementById("mychart3").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($arr_nom) ?>,
                            datasets: [{
                                label: 'La 2eme note est',
                                data: <?php echo json_encode($arr_moyenne) ?>,
                                backgroundColor:'#efefef',
                                borderColor: '#4c8cd5',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:false
                                    }
                                }]
                            }
                        }
                    });
				</script>

			</div>
		</div>

	</div>

</section>

<?php include 'includes/footer.php'; ?>
