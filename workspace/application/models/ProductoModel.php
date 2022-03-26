<?php
    class ProductoModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('producto_especifico',array('id' => $id));
            return $query->row_array();
        }

        public function todos()
        {
            $resultado = $this->db->query(
                ' select pe.id, pe.codigo_especifico, pg.descripcion, e.nombre'.
                ' from producto_especifico pe'. 
                ' inner join establecimiento e on pe.id_establecimiento = e.id'.
                ' inner join producto_generico pg on pe.id_producto_generico = pg.id'
            );
            return $resultado;
        }

        public function crear($codigo_especifico,$id_producto_generico,$id_establecimiento)
        {
            $resultado=$this->db->query("INSERT INTO producto_especifico (codigo_especifico, id_producto_generico, id_establecimiento) VALUES('$codigo_especifico','$id_producto_generico','$id_establecimiento');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$codigo_especifico,$id_producto_generico,$id_establecimiento)
        {
            $data = array(
                'id' => $id,
                'codigo_especifico' => $codigo_especifico,
                'id_producto_generico' => $id_producto_generico,
                'id_establecimiento' => $id_establecimiento            
            );
            $this->db->where('id', $id);
            return $this->db->update('producto_especifico', $data);

        }

        
	public function eliminar($id)
	{
	   $this->db->where('id',$id);
	   $this->db->delete('producto_especifico');
	}


    }

?>