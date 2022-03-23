<?php
    class ValidacionModel extends CI_Model
    {

        public function validar($usuario,$clave)
        {
            $query=$this->db->query("SELECT count(*) AS total FROM usuario u WHERE u.usuario ='$usuario' and u.clave ='$clave'");
            //var_dump($query->row_array());
            //return $query->row_array(); //Devuelve un unico resultado
            
            $resultado=$query->row_array();
            $totalResultado=$resultado["total"];
            if(strcmp($totalResultado,"1")==0)
            {
                return true;
            }
            return false;

        }

       

    }

?>