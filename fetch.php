<?php include 'includes/db.php' ?>


<?php
if(isset($_POST["query"]))
{
	$search =  $_POST["query"];
	$query = "
	SELECT * FROM etudiant 
	WHERE nom LIKE '%".$search."%'
	OR prenom LIKE '%".$search."%' 
	OR date_de_naissance LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR moyenne LIKE '%".$search."%'
	";

	$stmt = $db->prepare($query);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_OBJ);

	foreach ($rows as $key => $row):
		$key++;

		?>
		<tr>
			<th scope="row"><?php echo $key ?></th>
			<td><?php echo $row->nom ?></td>
			<td><?php echo $row->prenom ?></td>
			<td><?php echo $row->email ?></td>
			<td>*********</td>
			<td><?php echo $row->note1 ?></td>
			<td><?php echo $row->note2 ?></td>
			<td><?php echo $row->moyenne ?></td>
			<td><?php echo $row->date_de_naissance ?></td>
			<td>
                <img style="width: 70px;height: 70px"
                     src="upload/profile/<?php echo $row->img ?>" alt="img profile">
            </td>
			<td><?php echo $row->created_at ?></td>
			<td>
				<a href="modifier.php?id=<?php echo $row->id ?>"
				   class="btn btn-warning text-white mt-1">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="supprimer.php?id=<?php echo $row->id ?>"
				   class="btn btn-danger text-white mt-1">
					<i class="fas fa-trash"></i>
				</a>
				<a href="detaills.php?id=<?php echo $row->id ?>"
				   class="btn btn-success text-white mt-1">
					<i class="fas fa-eye"></i>
				</a>

			</td>
		</tr>
		<?php

	endforeach;

}else{
	$etudiant->dataview();
}

