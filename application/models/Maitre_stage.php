<?php
class Maitre_stage extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
    {
        if(!empty($data))
        {
            $sql="select * from maitre_stage where email='".$data['email']."'";
            $query = $this->db->query($sql);

            if(!($query->num_rows() > 0))
            {
                $sql="insert into maitre_stage VALUES ('".$data['email']."','".$data['nom']."','".$data['prenom']."')";
                $this->db->query($sql);
            }
        }
    }
}
