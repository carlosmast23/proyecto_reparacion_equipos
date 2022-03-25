<?php
    class CategoriaModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('categoria',array('id' => $id));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function todos()
        {
            $resultado=$this->db->get('categoria');
            return $resultado;
        }

        public function crear($nombre,$descripcion)
        {
            $resultado=$this->db->query("INSERT INTO categoria (nombre,descripcion) VALUES('$nombre','$descripcion');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$nombre,$descripcion)
        {
            $data = array(
                'id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            );
            $this->db->where('id', $id);
            return $this->db->update('categoria', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('categoria');
	}


    }

?>