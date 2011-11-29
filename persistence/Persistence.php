<?php
class Persistence {
    private $_con;
    public function __construct() {
        try {
            $this->_con = mysql_connect("localhost","root");
            if(!$this->_con){
                $this->_con = null;
                throw new Exception("Error en la conexción");
            }
            $db = mysql_select_db("encuestaCafe", $this->_con);
            if(!$db){
                mysql_close($this->_con);
                $this->_con = null;
                throw new Exception("Error, base de daos no existe");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function ejecutarConsulta($query, $tipo){
        try {
            $rs = mysql_query($query, $this->_con);
            if(mysql_errno($this->_con) != 0){
                throw new Exception(mysql_error($this->_con));
            }
            if($tipo==1){
                $lista = array();
                while($row = mysql_fetch_assoc($rs)){
                    $lista [] = $row;
                }
                mysql_free_result($rs);
                return $lista;
            }
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function getAll(){
        $sql = "SELECT * FROM `cafes` LIMIT 0, 30 ";
        $lista = $this->ejecutarConsulta($sql, 1);
        return $lista;
    }
    public function getCafeById($id){
        $sql = "SELECT * FROM `cafes` where id = $id LIMIT 0, 30 ";
        $lista = $this->ejecutarConsulta($sql, 1);
        return $lista;
    }
    public function updateCafePuntaje($id,$puntaje){
        $sql = "UPDATE `encuestaCafe`.`cafes` SET `puntaje` = '$puntaje' WHERE `cafes`.`id` = $id LIMIT 1;";
        $this->ejecutarConsulta($sql, 2);
    }

    public function insertarVotante($sexo, $edad,$ptaje1,$ptaje2,$ptaje3,$ptaje4){
        $sql = "INSERT INTO `encuestaCafe`.`votantes` (`id`, `sexo`, `edad`, `ptajeCafe1`, `ptajeCafe2`, `ptajeCafe3`, `ptajeCafe4`) VALUES (NULL, '$sexo', '$edad', '$ptaje1', '$ptaje2', '$ptaje3', '$ptaje4');";
        $this->ejecutarConsulta($sql, 2);
    }
    
    public function getVotantesByRangoEdad($edadDesde, $edadHasta){
        $sql = "SELECT * FROM `votantes` WHERE `edad` between $edadDesde and $edadHasta LIMIT 0, 30 ";
        $lista=$this->ejecutarConsulta($sql, 1);
        return $lista;
    }

}
?>
