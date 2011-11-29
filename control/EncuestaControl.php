<?php
require_once '../model/Cafe.php';
abstract class EncuestaControl {
    public static function votar($arreglo){
        $p=array();
        $c = new Cafe();
        for($i=0;$i<4;$i++){
            if($arreglo[$i]==1){
                $cafe = $c->getCafeById($i+1);
                $puntaje = $cafe->get_puntaje()+3;
                $c->updateCafePuntaje($i+1,$puntaje);
                $p[]=3;
            }
            if($arreglo[$i]==2){
                $cafe = $c->getCafeById($i+1);
                $puntaje = $cafe->get_puntaje()+2;
                $c->updateCafePuntaje($i+1,$puntaje);
                $p[]=2;
            }
            if($arreglo[$i]==3){
                $cafe = $c->getCafeById($i+1);
                $puntaje = $cafe->get_puntaje()+1;
                $c->updateCafePuntaje($i+1,$puntaje);
                $p[]=1;
            }
            if($arreglo[$i]==4){
                $cafe = $c->getCafeById($i+1);
                $puntaje = $cafe->get_puntaje();
                $c->updateCafePuntaje($i+1,$puntaje);
                $p[]=0;
            }
        }
        return $p;
    }
    public static function getAllVotaciones(){
        $cafe = new Cafe();
        return $cafe->getAll();
    }
    public static function ingresarVotante($sexo, $edad, $ptaje1, $ptaje2, $ptaje3, $ptaje4){
        $v = new Votante();
        $v->ingresarVotante($sexo, $edad, $ptaje1, $ptaje2, $ptaje3, $ptaje4);
    }
    public static function getVotantesByRangoEdad($edadDesde, $edadHasta){
        $v = new Votante();
        $lista = $v->getVotantesByRangoEdad($edadDesde, $edadHasta);
        $sumaPtaje1=0;
        $sumaPtaje2=0;
        $sumaPtaje3=0;
        $sumaPtaje4=0;
        foreach($lista as $v){
            $sumaPtaje1= $sumaPtaje1 + $v->get_ptaje1();
            $sumaPtaje2= $sumaPtaje2 + $v->get_ptaje2();
            $sumaPtaje3= $sumaPtaje3 + $v->get_ptaje3();
            $sumaPtaje4= $sumaPtaje4 + $v->get_ptaje4();
        }
        $vot = new Votante(null, 'Varios', $edadDesde.$edadHasta, $sumaPtaje1, $sumaPtaje2, $sumaPtaje3, $sumaPtaje4);
        return $vot;
    }
}
?>
