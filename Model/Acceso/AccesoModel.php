<?php

    include_once '../Model/MasterModel.php';

    class accesoModel extends MasterModel{
        public function login($sql, $params = array()) {
            
            $result = pg_query_params($this->getConnect(), $sql, $params);
            
            if (!$result) {
                throw new Exception("Error en la consulta: " . pg_last_error($conn));
            }
        
            $data = pg_fetch_all($result);
        
            if ($data === false) {
                return null; 
            } elseif (count($data) === 1) {
                return $data[0]; 
            } else {
                return $data; 
            }
        }
    }
?>