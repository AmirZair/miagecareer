<?php
class Admin extends CI_Controller{
    public function view(){

        $this->load->view('Admin/templates/header');
        $this->load->view('Admin/pages/home');

    }
}