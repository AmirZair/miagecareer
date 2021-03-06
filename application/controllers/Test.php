<?php
    class Historique extends CI_Controller{
        public function view($page = 'Historique'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }}
public function view2(){
            $data= array(
                'entreprise'=>$this->Annonce->get_entreprise(1),
                'offre_stage' => $this->Annonce->get_annonce(NULL,1),
                'niveau'=>$this->Annonce->get_niveau(1),
                'duree'=>$this->Annonce->get_duree(1),
                 'ville'=>$this->Annonce->get_ville(1)
            );

            $this->load->library('pagination');

            $config = array();

       $config["base_url"] = base_url() . "historique/view2";
       $query = $this->db->get_where('offre_stage', array('libre' => 0));
       $config["total_rows"] = $query->num_rows();

       $config["per_page"] = 1;

       $config["uri_segment"] = 3;

       $this->pagination->initialize($config);

       $page2 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


       $data["results"] = $this->Annonce->fetch_offre($config["per_page"], $page2);

       $data["links"] = $this->pagination->create_links();
       echo $this->db->last_query();

            $this->load->view('templates/header2');
            $this->load->view('pages/historique', $data);
            $this->load->view('templates/footer');
        }

        public function search_h($page='historique')
          {
            $datas=$this->input->get();
            $data= array(
                'offre_stage' => $this->Annonce->get_annonce($datas,1),
                'entreprise'=>$this->Annonce->get_entreprise(1),
                'niveau'=>$this->Annonce->get_niveau(1),
                'duree'=>$this->Annonce->get_duree(1),
                'ville'=>$this->Annonce->get_ville(1)
            );

            $this->load->view('templates/header2');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
          }
      }
