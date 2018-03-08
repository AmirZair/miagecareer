<?php include('Modals/entreprise_modal_update.php') ?>
<?php include('Modals/entreprise_modal_add.php') ?>



<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container-fluid no-padding" style="max-width: calc(100vw - 250px); width: calc(100vw - 250px); overflow: hidden; /*border: 1px solid red;*/">
    <h1 style="text-align: center; font-family: 'Comic Sans MS';">Liste des Entrerpises</h1>
    <div style="margin-top: 20px;">
        <table id="mytable" class="table table-bordered table-striped table-hover table-condensedk">
            <thead>
            <tr>
                <th style="width: 10em;">Nom entreprise</th>
                <th>Ville</th>
                <th>secteur</th>
                <th>adresse</th>
                <th>M.à.j</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($entreprise as $e) {
                echo '<tr>';
                echo '<td>'.$e['nom_entreprise'].'</td>';
                echo '<td>'.$e['ville'].'</td>';
                echo '<td>'.$e['secteur'].'</td>';
                echo '<td>'.$e['adresse'].'</td>';
                echo '<td style="text-align: center;"><a id="update-entreprise" class="update-entreprise"><span class="glyphicon glyphicon-edit"></span></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <button id="add_entreprise" class="btn btn-primary form-control" style="margin-top: 50px;">Ajouter une entreprise</button>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').dataTable();
    } );


    function ConfirmDelete()
    {
        var x = confirm("Voulez vous supprimer l'offre de stage ?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<!-- ***********************update********************************** -->

