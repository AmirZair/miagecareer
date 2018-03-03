<?php
class Contact extends CI_Controller{

    public function view(){

      $this->load->view('templates/header_contact');

      $this->load->view('pages/contact');

      $this->load->view('templates/footer');
    }

    public function contacter ()
    {
        $datas=$this->input->post();

        print_r($datas);

        $this->load->view('templates/header_contact');

        $this->load->view('pages/contact');

        $this->load->view('templates/footer');
    }




  }
