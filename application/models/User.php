<?php
class User extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_user($data)
    {
        if(!empty($data))
        {
            $this->db->insert('utilisateur', $data);
        }
    }

    public function verif($data)
    {
        if(!empty($data))
        {
            $sql="select * from utilisateur where valider = 1 AND ID_email='".$data['ID_email']."' AND mdp='".$data['password']."'";
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
            {
                return True;
            }
            return False;
        }
    }

    public function get_user_s($data)
    {
        $sql="select * from utilisateur where valider = 1 AND ID_email='".$data['ID_email']."' AND mdp='".$data['password']."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_user()
    {
        $query=$this->db->query("select *  from utilisateur where
            ID_email <> '00000000@parisnanterre.fr'");
        return $query->result_array();
    }

    public function existe($datas)
    {

        $sql = "select * from utilisateur where ID_email='".$datas['ID_email']."'";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return True;
        }
        $this->add_user($datas);
        return False;
    }



}