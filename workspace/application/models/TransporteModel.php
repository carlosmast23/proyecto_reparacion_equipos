<?php
    class TransporteModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('transporte',array('id' => $id));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function todos()
        {
            $resultado=$this->db->get('transporte');
            return $resultado;
        }

        public function crear($placa,$capacidad,$nombreChofer,$descripcion)
        {
            $resultado=$this->db->query("INSERT INTO molinuco.transporte (placa, capacidad, nombre_chofer, descripcion) VALUES('$placa', $capacidad, '$nombreChofer', '$descripcion');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$placa,$capacidad,$nombreChofer,$descripcion)
        {
            $data = array(
                'id' => $id,
                'placa' => $placa,
                'capacidad' => $capacidad,
                'nombre_chofer' => $nombreChofer,
                'descripcion' => $descripcion,                
            );
            $this->db->where('id', $id);
            return $this->db->update('molinuco.transporte', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('transporte');
	}


    }

?>