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

        public function crear($nombre)
        {
            $resultado=$this->db->query("INSERT INTO categoria (nombre) VALUES('$nombre', $clave, '$nombres', '$correo');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$usuario,$clave,$nombres,$correo)
        {
            $data = array(
                'id' => $id,
                'nick' => $usuario,
                'clave' => $clave,
                'nombres' => $nombres,
                'correo_electronico' => $correo,                
            );
            $this->db->where('id', $id);
            return $this->db->update('usuario', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('usuario');
	}


    }

?>