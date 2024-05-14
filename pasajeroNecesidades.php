<?php
include "pasajero.php";
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
}