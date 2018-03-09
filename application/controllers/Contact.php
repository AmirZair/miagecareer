<?php
class Contact extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function view(){

      $this->load->view('templates/header_contact');

      $this->load->view('pages/contact');

      $this->load->view('templates/footer');
    }

    public function contacter()
    {
        $to='test.smtp.95@gmail.com';

        $subject=$this->input->post('sujet');
        $message = $this->input->post('message')."From :".$this->input->post('email_utilisateur');
        print_r($message);
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to,$subject,$message,$headers);
        echo'<script>alert("Message envoyé");</script>';
        echo'<script>window.location.href = "'.base_url().'/contact";</script>';

    }




  }
