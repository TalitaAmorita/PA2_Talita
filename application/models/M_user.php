<?php
class M_user extends CI_Model {


 public function getUser($email) {
        $query = $this->db->get_where('user', ['email'=>$email]);
        return $query->result();
 }

}