<?php
class ajouter_offre extends CI_Controller{

    public function add_offre()
    {
        $datas = array(
            'intitule' => $this->input->post('intitule_offre'),
            'date_debut' => $this->input->post('date_debut'),
            'mission' => $this->input->post('mission'),
            'duree' => $this->input->post('offre_duree'),
            'niveau_etude' => $this->input->post('niveau_etude'),
            'nom_entreprise' => $this->input->post('nom_entreprise'),
            'ville' => $this->input->post('ville'),
            'secteur' => $this->input->post('secteur'),
            'adresse' => $this->input->post('adresse'),
            'email_utilisateur' => $this->input->post('email_utilisateur')
        );

        $this->Annonce->ajouter_annonce($datas);

        echo'<script>alert("offre ajoutée avec succes");</script>';
        echo'<script>window.location.href = "'.base_url().'";</script>';
    }



}
