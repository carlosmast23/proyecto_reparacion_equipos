<?php
    class UsuarioModel extends CI_Model
    {

        public function buscarPorId($id)
        {
            $query=$this->db->get_where('usuario',array('id' => $id));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function buscarPorUsuario($usuario)
        {
            $query=$this->db->get_where('usuario',array('usuario' => $usuario));
            return $query->row_array(); //Devuelve un unico resultado
        }

        public function todos()
        {
            $resultado=$this->db->get('usuario');
            return $resultado;
        }

        public function crear($usuario,$clave,$apellidos,$nombres,$correo,$cargo,$tipo)
        {
            $resultado=$this->db->query("INSERT INTO usuario (usuario, clave, apellidos,nombres, correo,cargo,tipo) VALUES('$usuario', $clave, '$nombres','$apellidos' ,'$correo','$cargo','$tipo');");
            if ($resultado == true) {
                return true;
            } else {
                return false;
            }

        }

        public function editar($id,$usuario,$clave,$apellidos,$nombres,$correo,$cargo,$tipo)
        {
            $data = array(
                'id' => $id,
                'usuario' => $usuario,
                'clave' => $clave,
                'apellidos' => $apellidos,
                'nombres' => $nombres,
                'correo' => $correo,                
                'cargo' => $cargo,
                'tipo' => $tipo
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