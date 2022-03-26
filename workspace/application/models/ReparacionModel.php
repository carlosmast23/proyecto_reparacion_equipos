<?php
    class ReparacionModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('reparacion',array('id' => $id));
            return $query->row_array();
        }

        public function buscarPorEstado($estado)
        {
            $resultado = $this->db->query(
                "select r.id, r.fecha_ingreso, r.estado, r.observaciones, pe.codigo_especifico, e.nombre, pg.descripcion".
                " from reparacion r".
                " inner join producto_especifico pe on r.id_producto_especifico = pe.id".
                " inner join establecimiento e on pe.id_establecimiento = e.id".
                " inner join producto_generico pg on pe.id_producto_generico = pg.id".
                " where r.estado ='$estado'"
            );
            return $resultado;
        }

        public function todos()
        {
            $resultado = $this->db->query(
                'select r.id, r.fecha_ingreso, r.estado, r.observaciones, pe.codigo_especifico, e.nombre, pg.descripcion'.
                ' from reparacion r'.
                ' inner join producto_especifico pe on r.id_producto_especifico = pe.id'.
                ' inner join establecimiento e on pe.id_establecimiento = e.id'.
                ' inner join producto_generico pg on pe.id_producto_generico = pg.id'
            );
            return $resultado;
        }

        public function crear($fecha_ingreso,$estado,$observaciones,$id_producto_especifico)
        {
            $resultado=$this->db->query("INSERT INTO reparacion (fecha_ingreso, estado, observaciones, id_producto_especifico) VALUES('$fecha_ingreso','$estado','$observaciones', '$id_producto_especifico');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$fecha_ingreso,$estado,$observaciones,$id_producto_especifico)
        {
            $data = array(
                'id' => $id,
                'fecha_ingreso' => $fecha_ingreso,
                'estado' => $estado,
                'observaciones' => $observaciones,
                'id_producto_especifico' => $id_producto_especifico   
            );
            $this->db->where('id', $id);
            return $this->db->update('reparacion', $data);

        }        
        public function eliminar($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('reparacion');
        }
    }

?>