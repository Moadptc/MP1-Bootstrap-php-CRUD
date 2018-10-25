<?php


class Etudiant {

	private $db_conn;
	public $nom;
	public $prenom;
	public $email;
	public $password;
	public $note1;
	public $note2;
	public $moyenne;
	public $date_de_naissance;


	// executer la connection
	public function __construct($db_conn)
    {
		$this->db_conn = $db_conn;
	}


    // inserer etudiant
	public function ajouterEtudiant($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance)
    {

	    $this->nom = $nom;
	    $this->prenom = $prenom;
	    $this->email = $email;
	    $this->password = $password;
	    $this->note1 = $note1;
	    $this->note2 = $note2;
	    $this->moyenne = $moyenne;

	    $stmt = $this->db_conn->
        prepare("insert into etudiant
                      values('',:nom,:prenom,:email,:password,:note1,:note2,:moyenne,:date_de_naissance
                      ,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");

	    $stmt->bindparam(':nom',$nom);
	    $stmt->bindparam(':prenom',$prenom);
	    $stmt->bindparam(':email',$email);
	    $stmt->bindparam(':password',$password);
	    $stmt->bindparam(':note1',$note1);
	    $stmt->bindparam(':note2',$note2);
	    $stmt->bindparam(':moyenne',$moyenne);
	    $stmt->bindparam(':date_de_naissance',$date_de_naissance);

	    $stmt->execute();
	    return true;
    }

    // inserer etudiant trash
	public function ajouterEtudiantTrash($nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance)
    {

	    $stmt = $this->db_conn->
        prepare("insert into trash
                      values('',:nom,:prenom,:email,:password,:note1,:note2,:moyenne,:date_de_naissance
                      ,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");

	    $stmt->bindparam(':nom',$nom);
	    $stmt->bindparam(':prenom',$prenom);
	    $stmt->bindparam(':email',$email);
	    $stmt->bindparam(':password',$password);
	    $stmt->bindparam(':note1',$note1);
	    $stmt->bindparam(':note2',$note2);
	    $stmt->bindparam(':moyenne',$moyenne);
	    $stmt->bindparam(':date_de_naissance',$date_de_naissance);

	    $stmt->execute();
	    return true;
    }

    // calc la moyenne
    public function calcMoyenne($note1,$note2)
    {
        $moyenne = ($note1+$note2)/2;
        return $moyenne;
    }


    // get id
    public function getId($id)
    {
        $stmt = $this->db_conn->prepare("select * from etudiant where id = :id");
        $stmt->bindparam(':id',$id);

        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }


    public function modifierEtudiant($id,$nom,$prenom,$email,$password,$note1,$note2,$moyenne,$date_de_naissance)
    {
        $stmt = $this->db_conn->prepare("update etudiant set 
                            nom=:nom,
                            prenom=:prenom,
                            email=:email,
                            password=:password,
                            note1=:note1,
                            note2=:note2,
                            moyenne=:moyenne,
                            updated_at=CURRENT_TIMESTAMP()
                            WHERE id = :id
                            ");


	    $stmt->bindparam(':id',$id);
	    $stmt->bindparam(':nom',$nom);
	    $stmt->bindparam(':prenom',$prenom);
	    $stmt->bindparam(':email',$email);
	    $stmt->bindparam(':password',$password);
	    $stmt->bindparam(':note1',$note1);
	    $stmt->bindparam(':note2',$note2);
	    $stmt->bindparam(':moyenne',$moyenne);


	    $stmt->execute();
	    return true;
    }


    // supprimer etudiant
    public function delete($id)
    {
        $stmt = $this->db_conn->prepare('delete from etudiant where id=:id');
        $stmt->bindparam(':id',$id);

	    $stmt->execute();
	    return true;

    }

    // restore trash
    public function restoreTrash($id)
    {
        $stmt = $this->db_conn->prepare('delete from trash where id=:id');
        $stmt->bindparam(':id',$id);

	    $stmt->execute();
	    return true;

    }

    public function redirectTo($url)
    {
        header("Location:$url");
    }



    // liste des etudiants
	public function dataview()
	{
		$stmt = $this->db_conn->prepare('select * from etudiant ORDER BY created_at DESC');
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
	}


    // liste des etudiants trashed
	public function trashed()
	{
		$stmt = $this->db_conn->prepare('select * from trash ORDER BY created_at DESC');
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
				<td><?php echo $row->created_at ?></td>
				<td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                        <button type="submit" name="restore"
                                class="btn btn-success text-white">
                            <i class="fas fa-undo"></i>
                        </button>
                    </form>

                </td>
			</tr>
		<?php

		endforeach;
	}


	// make auth
    public function auth()
    {

	    if (isset($_POST['login'])) {


		    $email = $_POST['email'] ;
		    $password = $_POST['password'];


		    $stmt = $this->db_conn-> prepare("SELECT * FROM etudiant
                                      WHERE
                                      email = :email AND password = :password
                                      LIMIT 1");

		    $stmt -> bindParam(':email',$email);
		    $stmt -> bindParam(':password',$password);
		    $stmt -> execute();
		    $row = $stmt -> fetch();
//    print_r($row). "result";

		    $row_count = $stmt -> rowCount();

		    if ($row_count  > 0) {

			    $_SESSION['id'] = $row['id'];
			    $_SESSION['nom'] = $row['nom'];
			    $_SESSION['prenom'] = $row['prenom'];
			    $_SESSION['email'] = $row['email'];
			    $_SESSION['password'] = $row['password'];
			    $_SESSION['auth'] = 'yes';



			    echo '<meta http-equiv="refresh" content="0;url=index.php" />';

			    //echo 'connected';

		    } else
		    {
			    echo '<div class="alert alert-danger">email ou password est incorrect !!</div>';
		    }


	    }
    }

	// check auth
	public function checkAuth()
    {
	    if(!isset($_SESSION['id'])) header("location:login.php");
    }


}

$etudiant = new Etudiant($db);