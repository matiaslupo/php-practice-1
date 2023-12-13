<?php

class pendientes_model extends CI_Model {

    private $tabla= 'pendientes';
    private $pk= 'id_tarea';

    public function listar_tareas($id= 0, $estado= TAREA_PENDIENTE){
        $this->db->where('usuario_id', $id);
        $this->db->where('estado', $estado);
        $res= $this->db->get($this->tabla);
        return $res->result_array();
    }

    public function nueva($datos= array()){
        $this->db->insert($this->tabla, $datos);
        if ($res= $this->db->insert_id())
            return $res;
        return false;
    }

    public function completar($id= 0){
        $this->db->set('estado', TAREA_COMPLETADA);
        $this->db->where($this->pk, $id);
        $this->db->limit(1);
        $this->db->update($this->tabla);
        return $this->db->affected_rows();
    }

    public function pendiente($id= 0){
        $this->db->set('estado', TAREA_PENDIENTE);
        $this->db->where($this->pk, $id);
        $this->db->limit(1);
        $this->db->update($this->tabla);
        return $this->db->affected_rows();
    }

    public function borrar($id=0){
        $this->db->where($this->pk, $id);
        $this->db->limit(1);
        $this->db->delete($this->tabla);
        return $this->db->affected_rows();
    }
}

?>