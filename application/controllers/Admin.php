<?php
class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->model('Maitre_stage');
        $this->load->model('Entreprise');
    }
    public function view(){
        $this->load->view('Admin/templates/header');
        $this->load->view('Admin/pages/home');
    }

    public function gerer_offre()
    {
        $data['offres'] = $this->Annonce->get_all();
        $data['entre'] = $this->Annonce->get_entreprise();
        if(empty($data['offres']))
            show_404();

        $this->load->view('Admin/templates/header');
        $this->load->view('Admin/pages/gerer_offres',$data);
    }

    public function gerer_offre_h()
    {
        $data['offres_h'] = $this->Annonce->get_annonce(NULL,1);
        $data['entre'] = $this->Annonce->get_entreprise();
        if(empty($data['offres_h']))
            show_404();

        $this->load->view('Admin/templates/header');
        $this->load->view('Admin/pages/gerer_h_offres',$data);
    }

    public function gerer_entreprise()
    {
        $data['entreprise'] = $this->Entreprise->get_all();
        if(empty($data))
            show_404();

        $this->load->view('Admin/templates/header');
        $this->load->view('Admin/pages/gerer_entreprise',$data);

    }

    public function delete_offre($id)
    {
        if(!empty($id)) $this->Annonce->remove_annonce($id);
        header("Location: ".base_url()."/admin/gerer_offre");
    }

    public function delete_offre_h($id)
    {
        if(!empty($id)) $this->Annonce->remove_annonce($id);
        header("Location: ".base_url()."/admin/gerer_offre_h");
    }

    public function update_offre()
    {
        $datas = array(
            'id' => $this->input->post('offre_id'),
            'intitule' => $this->input->post('intitule_offre'),
            'mission' => $this->input->post('mission_description'),
            'duree' => $this->input->post('offre_duree'),
            'niveau_etude' => $this->input->post('niveau_etude'),
            'nom_entreprise' => $this->input->post('entreprise'),
            'date_debut' => $this->input->post('date_debut')
        );

        if(!empty($datas))
            $this->Annonce->update($datas);

        header("Location: ".base_url()."/admin/gerer_offre");
    }

    public function update_offre_h()
    {
        $datas = array(
            'id' => $this->input->post('offre_id'),
            'intitule' => $this->input->post('intitule_offre'),
            'mission' => $this->input->post('mission_description'),
            'date_debut' => $this->input->post('date_debut')
        );

        if(!empty($datas))
            $this->Annonce->update($datas);

        header("Location: ".base_url()."/admin/gerer_offre_h");
    }

    public function add_offre()
    {
        $datas = array(
            'id' => '',
            'libre' => '1',
            'intitule' => $this->input->post('intitule_offre'),
            'mission' => $this->input->post('mission_description'),
            'duree' => $this->input->post('offre_duree'),
            'niveau_etude' => $this->input->post('niveau_etude'),
            'nom_entreprise' => $this->input->post('entreprise'),
            'date_debut' => $this->input->post('date_debut'),
            'email_utilisateur' => $this->input->post('email_utilisateur')
        );

        if(!empty($datas))
            $this->Annonce->add($datas);

        header("Location: ".base_url()."/admin/gerer_offre");
    }

    public function add_offre_h()
    {
        $datas = array(
            'id' => '',
            'libre' => '0',
            'intitule' => $this->input->post('intitule_offre'),
            'mission' => $this->input->post('mission_description'),
            'duree' => $this->input->post('offre_duree'),
            'niveau_etude' => $this->input->post('niveau_etude'),
            'nom_entreprise' => $this->input->post('entreprise'),
            'date_debut' => $this->input->post('date_debut'),
            'email_utilisateur' => $this->input->post('email_utilisateur'),
            'email_maitre' => $this->input->post('email')
        );

        $maitre = array(
            'email' => $this->input->post('email'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom')
        );


        if(!empty($datas))
        {
            $this->Maitre_stage->add($maitre);
            $this->Annonce->add($datas);
        }
        header("Location: ".base_url()."/admin/gerer_offre_h");
    }

    public function attribue()
    {
        $datas = array(
            'id' => $this->input->post('offre_id2'),
            'libre' => '0',
            'email' => $this->input->post('email'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom')
        );

        if(!empty($datas))
            $this->Annonce->atribution($datas);

        header("Location: ".base_url()."/admin/gerer_offre");
    }
}