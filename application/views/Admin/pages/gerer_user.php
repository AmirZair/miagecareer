<?php include('Modals/offre_modal_update.php') ?>
<?php include('Modals/offre_modal_add.php') ?>
<?php include('Modals/attribution_modal.php') ?>

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="container-fluid no-padding" style="max-width: calc(100vw - 250px); width: calc(100vw - 250px); overflow: hidden; /*border: 1px solid red;*/">
    <h1 style="text-align: center; font-family: 'Comic Sans MS';">Liste des Utilisateurs</h1>
    <div style="margin-top: 20px;">
        <table id="mytable" class="table table-bordered table-striped table-hover table-condensedk">
            <thead>
            <tr>
                <th style="width: 10em;">Email</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>mot de passe</th>
                <th>tél</th>
                <th>Activer</th>
                <th>Désactiver</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($User as $u) {
                echo '<tr>';
                echo '<td>'.$u['ID_email'].'</td>';
                echo '<td>'.$u['nom'].'</td>';
                echo '<td>'.$u['prenom'].'</td>';
                echo '<td>'.$u['mdp'].'</td>';
                echo '<td>'.$u['tel'].'</td>';
                echo '
						 			<td style="text-align: center;" >
						 				<a href="activer_compte/'.$u['ID_email'].'"> <span style="color: green;" class="glyphicon glyphicon-ok"></span> </a>
						 			</td>';
                echo '
						 			<td style="text-align: center;">
						 				<a href="desactiver_compte/'.$u['ID_email'].'"> <span style="color: red;" class="glyphicon glyphicon-remove"></span> </a>
						 			</td>';

            }
            ?>
            </tbody>
        </table>
    </div>
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

