<?php

class usuarios_model extends CI_Model {

    private $tabla= 'usuarios';
    private $pk= 'usuario_id';

    public function login($credenciales= array('nick' => '', 'clave' => '')){
        $this->db->select($this->pk.", nick");
        $this->db->where("nick", $credenciales['nick']);
        $this->db->where("password", $credenciales['clave']);
        $this->db->limit(1);
        $res= $this->db->get($this->tabla);
        if ($res->num_rows()){
            return $res->row_array();
        }
        return false;
    }

}

?>