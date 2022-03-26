<?php
    class CatalogoModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('producto_generico',array('id' => $id));
            // $resultado = $this->db->query(
            //     'select pg.id, pg.codigo, pg.descripcion, pg.estado, c.id_categoria'.
            //     ' from producto_generico pg inner join categoria c on pg.id_categoria = c.id'.
            //     ' where pg.id='.$id);
            // return $resultado->row_array(); //Devuelve un unico resultado
            return $query->row_array();
        }

        public function todos()
        {
            $resultado = $this->db->query(
                'select pg.id, pg.codigo, pg.descripcion, pg.estado, c.nombre'.
                ' from producto_generico pg inner join categoria c on pg.id_categoria = c.id'
            );
            return $resultado;
        }

        public function crear($codigo,$descripcion,$id_categoria)
        {
            $resultado=$this->db->query("INSERT INTO producto_generico (codigo,descripcion,id_categoria) VALUES('$codigo','$descripcion','$id_categoria');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$codigo,$descripcion,$id_categoria)
        {
            $data = array(
                'id' => $id,
                'codigo' => $codigo,
                'descripcion' => $descripcion,
                'id_categoria' => $id_categoria            
            );
            $this->db->where('id', $id);
            return $this->db->update('producto_generico', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('producto_generico');
	}


    }

?>