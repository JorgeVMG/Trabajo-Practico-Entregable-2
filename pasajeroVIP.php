<?php
include_once "pasajero.php";
class PasajeroVIP extends Pasajero{
    private $nroFrecuencia;
    private $millas;

    public function __construct($nom,$nroAsie,$nroTick,$apel,$numDoc,$telf,$nroFrecue,$mil){
        parent:: __construct($nom,$nroAsie,$nroTick,$apel,$numDoc,$telf);
        $this->nroFrecuencia = $nroFrecue;
        $this->millas = $mil;
    }
    public function getNroFrecuencia(){
        return $this->nroFrecuencia;
    }
    public function getMillas(){
        return $this->millas;
    }
    public function setNroFrecuencia($nroFrecue){
        $this->nroFrecuencia = $nroFrecue;
    }
    public function setMillas($mil){
        $this->millas = $mil;
    }
    public function __toString(){
        $cad = parent:: __toString();
        $cad .= "Numero de Frecuencia: ".$this->getNroFrecuencia()."\nMillas recorido: ".$this->getMillas();
    }
    public function darPorcentajeIncremento(){
        if($this->getMillas()>300){
            $porcentaje = 30;
        }else{
            $porcentaje = 35;
        }
        return $porcentaje;
    }
}
