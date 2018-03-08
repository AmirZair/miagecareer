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