<?php
class ajouter_offre extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function add_offre()
    {
        $offre = array(
            'id' => '',
            'intitule' => $this->input->post('intitule_offre'),
            'date_debut' => $this->input->post('date_debut'),
            'mission' => $this->input->post('mission'),
            'duree' => $this->input->post('offre_duree'),
            'niveau_etude' => $this->input->post('niveau_etude'),
            'libre' => '1',
            'email_utilisateur' => $this->input->post('email_utilisateur'),
            'nom_entreprise' => $this->input->post('nom_entreprise'),
            'date_creation' => ''
        );

        $entreprise = array(
            'nom_entreprise' => $this->input->post('nom_entreprise'),
            'ville' => $this->input->post('ville'),
            'secteur' => $this->input->post('secteur'),
            'adresse' => $this->input->post('adresse'),
        );

        $this->Annonce->ajouter_annonce($offre,$entreprise);

        echo'<script>alert("offre ajoutée avec succes");</script>';
        echo'<script>window.location.href = "'.base_url().'";</script>';
    }



}
