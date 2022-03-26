<?php
    class EstablecimientoModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('establecimiento',array('id' => $id));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function todos()
        {
            $resultado=$this->db->get('establecimiento');
            return $resultado;
        }

        public function crear($nombre)
        {
            $resultado=$this->db->query("INSERT INTO establecimiento (nombre) VALUES('$nombre');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$nombre)
        {
            $data = array(
                'id' => $id,
                'nombre' => $nombre,           
            );
            $this->db->where('id', $id);
            return $this->db->update('establecimiento', $data);
        }

        
        public function eliminar($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('establecimiento');
        }


    }

?>