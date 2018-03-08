<?php
class Entreprise extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $sql ='select * from entreprise';
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function add_entreprise($entreprise)
    {
        if(!empty($entreprise))
        {
            $this->db->insert('entreprise', $entreprise);
        }
    }

}