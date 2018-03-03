<?php
    class Historique extends CI_Controller{
        public function view($page = 'Historique'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data= array(
                'entreprise'=>$this->Annonce->get_entreprise(1),
                'offre_stage' => $this->Annonce->get_annonce(NULL,1),
                'niveau'=>$this->Annonce->get_niveau(1),
                'duree'=>$this->Annonce->get_duree(1),
                 'ville'=>$this->Annonce->get_ville(1)
            );
            $this->load->view('templates/header2');
            $this->load->view('pages/'.$page, $data);
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
