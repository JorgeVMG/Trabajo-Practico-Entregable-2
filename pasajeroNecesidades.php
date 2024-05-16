<?php
include_once "pasajero.php";
class PasajeroNecesidades extends Pasajero{
    private $tipoNecesitades;
    public function __construct($nom,$apel,$numDoc,$telf,$nroAsie,$nroTick,$tipNece){
        parent::__construct($nom,$apel,$numDoc,$telf,$nroAsie,$nroTick);
        $this->tipoNecesitades = $tipNece;
    }
    public function getTipoNecesidades(){
        return $this->tipoNecesitades;
    }
    public function setTipoNecesidades($tipNece){
        $this->tipoNecesitades = $tipNece;
    }
    public function __toString(){
        $cad = parent:: __toString();
        $cad .= "Tipo de necesidad: ".$this->getTipoNecesidades(); 
        return $cad;
    }
    public function darPorcentajeIncremento(){
        if(count($this->getTipoNecesidades())==3){
            $porcentaje = 30;
        }else{
            $porcentaje = 15;
        }
        return $porcentaje;
    }
}