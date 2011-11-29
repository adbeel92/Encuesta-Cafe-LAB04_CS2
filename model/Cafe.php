<?php
require_once '../Persistence/Persistence.php';
require_once '../model/Votante.php';
class Cafe {
    private $_id;
    private $_tipo;
    private $_puntaje;
    private $_votante;
    public function __construct($id="",$tipo="",$puntaje="", Votante $votante=null) {
        $this->_id=$id;
        $this->_tipo=$tipo;
        $this->_puntaje=$puntaje;
        $this->_votante=$votante;
    }
    public function get_id() {
        return $this->_id;
    }

    public function get_tipo() {
        return $this->_tipo;
    }

    public function get_puntaje() {
        return $this->_puntaje;
    }

    public function get_votante() {
        return $this->_votante;
    }

    public function getAll(){
        $p = new Persistence();
        $cafes = $p->getAll();
        $cafeLista=array();
        foreach($cafes as $c){
            $id = $c['id'];
            $tipo = $c['tipo'];
            $puntaje = $c['puntaje'];
            $cafeLista[] = new Cafe($id, $tipo, $puntaje);
        }
        return $cafeLista;
    }
    public function getCafeById($id){
        $p = new Persistence();
        $cafes = $p->getCafeById($id);
        $cafeLista=array();
        foreach($cafes as $c){
            $id = $c['id'];
            $tipo = $c['tipo'];
            $puntaje = $c['puntaje'];
            return new Cafe($id, $tipo, $puntaje);
        }
        return false;
    }
    public function updateCafePuntaje($id,$puntaje){
        $p = new Persistence();
        $p->updateCafePuntaje($id, $puntaje);
    }
    
}
?>
