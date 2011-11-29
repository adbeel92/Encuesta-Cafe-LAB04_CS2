<?php
require_once '../Persistence/Persistence.php';
class Votante {
    private $_id;
    private $_sexo;
    private $_edad;
    private $_ptaje1;//En sí puntaje no es la palabra correcta, pero está referido al orden de cafés por preferencia
    private $_ptaje2;//ptaje2 es de café2... digamos q este sea malísimo... le pongo 4
    private $_ptaje3;//ptaje3 es de café3... digamos q este sea el mejor para el votante... le pone 1
    private $_ptaje4;
    public function __construct($id="",$sexo="",$edad="",$ptaje1="",$ptaje2="",$ptaje3="",$ptaje4="") {
        $this->_id=$id;
        $this->_sexo=$sexo;
        $this->_edad=$edad;
        $this->_ptaje1=$ptaje1;
        $this->_ptaje2=$ptaje2;
        $this->_ptaje3=$ptaje3;
        $this->_ptaje4=$ptaje4;
                
    }
    public function get_id() {
        return $this->_id;
    }

    public function get_sexo() {
        return $this->_sexo;
    }

    public function get_edad() {
        return $this->_edad;
    }
    public function get_ptaje1() {
        return $this->_ptaje1;
    }

    public function get_ptaje2() {
        return $this->_ptaje2;
    }

    public function get_ptaje3() {
        return $this->_ptaje3;
    }

    public function get_ptaje4() {
        return $this->_ptaje4;
    }

    public function ingresarVotante($sexo, $edad,$ptaje1,$ptaje2,$ptaje3,$ptaje4){
        $p = new Persistence();
        $p->insertarVotante($sexo, $edad,$ptaje1,$ptaje2,$ptaje3,$ptaje4);
    }
    
    public function getVotantesByRangoEdad($edadDesde, $edadHasta){
        $p=new Persistence();
        $lista = $p->getVotantesByRangoEdad($edadDesde, $edadHasta);
        $listaVotantes = array();
        foreach ($lista as $l) {
            $id=$l['id'];
            $sexo=$l['sexo'];
            $edad=$l['edad'];
            $p1=$l['ptajeCafe1'];
            $p2=$l['ptajeCafe2'];
            $p3=$l['ptajeCafe3'];
            $p4=$l['ptajeCafe4'];
            $listaVotantes[] = new Votante($id, $sexo, $edad, $p1, $p2, $p3, $p4);
        }
        return $listaVotantes;
    }

}
?>
