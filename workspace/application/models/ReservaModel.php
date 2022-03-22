<?php
class ReservaModel extends CI_Model
{
    /*
        ESTADOS: P:PENDIENTE PAGO , C:CANCELADO , E:ELIMINADO
        */

    public function buscarPorId($id)
    {
        //$query=$this->db->get_where('reserva',array('id' => $id));
        $resultado = $this->db->query('SELECT r.id,r.nombre,r.telefono ,r.email,pt.precio,pt.nombre as nombrePaquete,pt.descripcion as descripcionPaquete,t.placa,h.nombre as nombreHospedaje FROM reserva r INNER JOIN paquete_turistico pt on r.id_paquete_turistico =pt.id INNER JOIN transporte t on pt.id_transporte =t.id INNER JOIN hospedaje h on pt.id_hospedaje =h.id WHERE r.id=' . $id);
        return $resultado->row_array(); //Devuelve un unico resultado
    }

    public function todosPedientesPago($query)
    {
        $resultado = $this->db->query("SELECT r.id,r.nombre,r.telefono ,r.email,r.estado,pt.nombre as nombrePaquete,pt.descripcion as descripcionPaquete,t.placa,h.nombre as nombreHospedaje FROM reserva r INNER JOIN paquete_turistico pt on r.id_paquete_turistico =pt.id INNER JOIN transporte t on pt.id_transporte =t.id INNER JOIN hospedaje h on pt.id_hospedaje =h.id AND r.estado='P' AND r.nombre like '$query' ");
        return $resultado;
    }

    public function todos()
    {
        $resultado = $this->db->query('SELECT r.id,r.nombre,r.telefono ,r.email,r.estado,pt.nombre as nombrePaquete,pt.descripcion as descripcionPaquete,t.placa,h.nombre as nombreHospedaje FROM reserva r INNER JOIN paquete_turistico pt on r.id_paquete_turistico =pt.id INNER JOIN transporte t on pt.id_transporte =t.id INNER JOIN hospedaje h on pt.id_hospedaje =h.id ');
        return $resultado;
    }

    public function crear($idPaqueteTurisca, $nombre, $telefono, $email, $estado)
    {
        $resultado = $this->db->query("INSERT INTO reserva (id_paquete_turistico, nombre, telefono, email,estado) VALUES('$idPaqueteTurisca', '$nombre', '$telefono', '$email','$estado');");
        if ($resultado == true) {
            return true;
        } else {
            return false;
        }
    }

    public function crearGetId()
    {
        return $this->db->insert_id();
    }

    public function editar($id, $idPaqueteTurisca, $nombre, $telefono, $email, $estado)
    {
        $data = array(
            'id' => $id,
            'id_paquete_turistico' => $idPaqueteTurisca,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'email' => $email,
            'estado' => $estado,
        );
        $this->db->where('id', $id);
        return $this->db->update('reserva', $data);
    }

    public function editarPersonalizado($id, $data)
    {
        
        $this->db->where('id', $id);
        return $this->db->update('reserva', $data);
    }


    public function eliminar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('reserva');
    }
}
