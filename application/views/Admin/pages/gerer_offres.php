<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container-fluid no-padding" style="max-width: calc(100vw - 250px); width: calc(100vw - 250px); overflow: hidden; /*border: 1px solid red;*/">
    <h1 style="text-align: center; font-family: 'Comic Sans MS';">Liste des offres de stage en cours</h1>
    <div style="margin-top: 20px;">
        <table id="mytable" class="table table-bordered table-striped table-hover table-condensedk">
            <thead>
            <tr>
                <th style="max-width: 15%;">id</th>
                <th style="max-width: 15%;">Intitule</th>
                <th style="max-width: 15%;">mission</th>
                <th style="max-width: 50%;">duree</th>
                <th style="max-width: 15%;">niveau</th>
                <th style="max-width: 8%;">Entreprise</th>
                <th style="max-width: 8%;">en ligne</th>
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
                echo '<td>'.$offre['niveau_etude'].' Mois'.'</td>';
                echo '<td>'.$offre['nom_entreprise'].'</td>';
                echo '<td style="text-align: center;">'.$offre['date_creation'].'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <button id="add-cmp" class="btn btn-primary form-control" style="margin-top: 50px;">Ajouter un Nouveau Compte</button>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').dataTable();
    } );
</script>