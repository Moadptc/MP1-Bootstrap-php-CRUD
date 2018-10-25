<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>


<section class="mt-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 py-3">
                <a href="ajouter.php" class="btn btn-primary mt-2">
                   <i class="fas fa-plus-circle"></i> Ajouter Etudiant
                </a>

                <a href="trash.php" class="btn btn-secondary mt-2">
                   <i class="fas fa-trash-alt"></i> Restaurer Etudiant
                </a>

                <a href="statistiques.php" class="btn btn-success mt-2">
                   <i class="fas fa-chart-area"></i> Statistiques
                </a>
            </div>

            <div class="col-lg-12 mt-2">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control"
                                placeholder="Rechercher" name="search_text"
                               id="search_text" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" >
                                <i class="fas fa-search"></i>
                            </span>
                        </div>

                    </div>
                </div>
                <br />

            </div>



            <div class="col-lg-12 table-section">
                <table class="table table-bordered table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Note 1</th>
                        <th>Note 2</th>
                        <th>Moyenne</th>
                        <th>Date de Naissance</th>
                        <th>Date de Creation</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="result">




                    </tbody>
                </table>

            </div>
        </div>
    </div>

</section>



<?php include 'includes/footer.php'; ?>

<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>




