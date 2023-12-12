<?php

class pendientes_model extends CI_Model {

    private $tabla= 'pendientes';
    private $pk= 'id_tarea';

    public function listar_tareas($id= 0){
        $this->db->where('usuario_id', $id);
        $res= $this->db->get($this->tabla);
        return $res->result_array();
    }

}

?>