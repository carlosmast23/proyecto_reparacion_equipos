<?php
    class HospedajeModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('hospedaje',array('id' => $id));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function todos()
        {
            $resultado=$this->db->get('hospedaje');
            return $resultado;
        }

        public function crear($nombre,$capacidad,$direccion)
        {
            $resultado=$this->db->query("INSERT INTO molinuco.hospedaje (nombre, capacidad, direccion) VALUES('$nombre', $capacidad, '$direccion');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$nombre,$capacidad,$direccion)
        {
            $data = array(
                'id' => $id,
                'nombre' => $nombre,
                'capacidad' => $capacidad,
                'direccion' => $direccion,             
            );
            $this->db->where('id', $id);
            return $this->db->update('molinuco.hospedaje', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('hospedaje');
	}


    }

?>