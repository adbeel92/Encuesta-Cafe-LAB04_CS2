<?php
require_once '../control/EncuestaControl.php';
abstract class View {
    public static function ejecutar(){
        if(!isset ($_GET['opcion'])){
            self::_mostrarIngreso();
        }else{
            $opcion = $_GET['opcion'];
            switch ($opcion){
                case 'ingresar':
                    self::_mostrarVotación();
                    break;
                case 'votar':
                    
                case 'filtrar':
                    self::_mostrarResultados();
                    break;
                default:
                    self::_mostrarIngreso();
                    break;
            }
        }
    }
    private static function _mostrarIngreso(){
        require_once 'IngresarDatos.html';
    }
    private static function _mostrarVotación(){
        $sexo=$_POST['sexo'];
        $edad=$_POST['edad'];
        require_once 'Votacion.html';
    }
    private static function _mostrarResultados(){
        $listaFiltro=null;
        if(!isset($_POST['filtro'])){
            //Sin filtro
            $sexo=$_POST['sexo'];
            $edad=$_POST['edad'];

            $v1 = $_POST['v1'];
            $v2 = $_POST['v2'];
            $v3 = $_POST['v3'];
            $v4 = $_POST['v4'];
            $a=array($v1,$v2,$v3,$v4);
            $p = EncuestaControl::votar($a);
            EncuestaControl::ingresarVotante($sexo, $edad, $p[0], $p[1], $p[2], $p[3]);
            $votaciones = EncuestaControl::getAllVotaciones();
        }else{
            //Con Filtro
            $filtro = $_POST['filtro'];
            if($filtro==1){$e1=18;$e2=24;}
            if($filtro==2){$e1=25;$e2=30;}
            if($filtro==3){$e1=31;$e2=40;}
            if($filtro==4){$e1=41;$e2=150;}
            $listaFiltro = EncuestaControl::getVotantesByRangoEdad($e1, $e2);
            $votaciones = EncuestaControl::getAllVotaciones();
        }
        require_once 'Resultados.html';
    }
}
View::ejecutar();
?>
