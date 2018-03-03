<!DOCTYPE html>
<html>
<!-- My head parameters -->
<head>
    <title>Miage career Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/Admin/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/Admin/css/datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/Admin/css/style.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>lib/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>lib/Admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>lib/Admin/js/datetimepicker.min.js"></script>
    <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('#panel-button').on('click', function(){
                var text = $('.icon-text').css("visibility");

                if(text == 'visible'){
                    $('.icon-text').css("visibility","hidden");
                    $('#my-panel').css("width","40px");
                }
                if(text == 'hidden'){
                    $('.icon-text').css("visibility","visible");
                    $('#my-panel').css("width","200px");
                }
            });
        });
    </script>
</head>

<!-- My Page body -->
<body>
<!-- The header of the home page -->
<nav id="up_page" class="navbar navbar-inverse back-office-nav">
    <div class="container-fluid no-padding">
        <div class="no-margin user">
            <a style="color: black;" href="../compte/accueil"><span style="margin-top: 5px; font-size: 35px;" class="fa fa-user-circle-o" aria-hidden="true"></span></a>
            <p class="user-text no-margin">Session ouverte pour : <br> Admin</p>
        </div>
        <div class="navbar-brand logout">
            <a href="../compte/logout">
                <span class="glyphicon glyphicon-log-in"></span> Logout
            </a>
        </div>
        <div class="container-fluid no-padding title">
            <span> Bienvenue sur l'espace Admin MIAGE career </span>
        </div>
    </div>
</nav>
<!-- End of the header and start of the side-panel -->
<div class="container-fluid no-padding" style="display: flex; justify-content: flex-start; flex-wrap: wrap;">
    <div id="my-panel" class="col-lg-2 side-panel">
        <div>
            <ul>
                <li id="panel-button" class="side-element panel-button">
                    <a><span class="glyphicon glyphicon-menu-hamburger"> </span> <span class="icon-text"> Reduire l'onglet</span></a>
                </li>
                <li class="side-element"><a href="../admin/gerer_offre"><span class="glyphicon glyphicon-stats"> </span> <span class="icon-text">Gérer les offres</span></a></li>
                <li class="side-element"><a href="test"><span class="glyphicon glyphicon-calendar"> </span> <span class="icon-text">Gérer l'historique des offres</span></a></li>
                <li class="side-element"><a href=""><span class="glyphicon glyphicon-user"> </span> <span class="icon-text">Gérer les utilisateurs</span></a></li>
                <li class="side-element"><a href=""><span class="glyphicon glyphicon-cog"> </span> <span class="icon-text">Gérer les Entreprises</span></a></li>
                <li class="side-element"><a href=""><span class="glyphicon glyphicon-question-sign" > </span> <span class="icon-text">Gérer les commentaires</span></a></li>
            </ul>
        </div>
    </div>
    <!-- End of side-panel and begin of content -->
