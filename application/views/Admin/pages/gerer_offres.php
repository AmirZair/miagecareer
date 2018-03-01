<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container-fluid no-padding" style="max-width: calc(100vw - 250px); width: calc(100vw - 250px); overflow: hidden; /*border: 1px solid red;*/">
    <h1 style="text-align: center; font-family: 'Comic Sans MS';">Liste des offres de stage en cours</h1>
    <div style="margin-top: 20px;">
        <table id="mytable" class="table table-bordered table-striped table-hover table-condensedk">
            <thead>
            <tr>
                <th>id</th>
                <th>Intitule</th>
                <th>mission</th>
                <th>duree</th>
                <th>niveau</th>
                <th>Entreprise</th>
                <th>en ligne</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($offres as $offre) {
                echo '<tr>';
                echo '<td>'.$offre['id'].'</td>';
                echo '<td>'.$offre['intitule'].'</td>';
                echo '<td>'.$offre['mission'].'</td>';
                echo '<td>'.$offre['duree'].' Mois'.'</td>';
                echo '<td>'.$offre['niveau_etude'].'</td>';
                echo '<td>'.$offre['nom_entreprise'].'</td>';
                echo '<td style="text-align: center;">'.$offre['date_creation'].'</td>';
                echo '<td style="text-align: center;">
										<a href="../admin/delete_offre/'.$offre['id'].'" Onclick="return ConfirmDelete();"><span style="color:red;" class="glyphicon glyphicon-trash"></span></a>
									</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <button id="add-cmp" class="btn btn-primary form-control" style="margin-top: 50px;">Ajouter une offre</button>
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