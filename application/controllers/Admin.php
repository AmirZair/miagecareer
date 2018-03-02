<?php
class Admin extends CI_Controller{

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

    public function delete_offre($id)
    {
        if(!empty($id)) $this->Annonce->remove_annonce($id);
        header("Location: ".base_url()."/admin/gerer_offre");
    }
}