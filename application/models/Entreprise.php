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
    public function get_nb_user()
    {
      $sql ='select * from utilisateur WHERE valider=0';
      $query = $this->db->query($sql);
  return $query->num_rows();

  }

  public function get_nb_al(){
    $sql ='select * from offre_stage WHERE libre=1';
    $query = $this->db->query($sql);
    return $query->num_rows();

  }
  public function get_nb_ap(){
    $sql ='select * from offre_stage WHERE libre=0';
    $query = $this->db->query($sql);
    return $query->num_rows();

  }
  public function get_nb_usert()
  {
    $sql ='select * from utilisateur';
    $query = $this->db->query($sql);
return $query->num_rows();
  }
}
