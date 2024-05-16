<?php
include "pasajero.php";
include "pasajeroVIP.php";
include "pasajeroNecesidades.php";
/**La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
 * De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
 * Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase
 * (incluso los datos de los pasajeros).
 * Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
 * Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */
class viaje{
    private $codigoViaje;
    private $destino;
    private $costoViaje;
    private $cantidadMaxPasajeros;
    private $colcPasajeros;
    private $objResponsable;
    
    /**Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase */
    public function __construct($codVia,$dest,$costo,$resp,$cantMaxP,$colcP){
        $this->codigoViaje = $codVia;
        $this->destino = $dest;
        $this->costoViaje = $costo;
        $this->objResponsable = $resp;//La clase Viaje debe hacer referencia al responsable de realizar el viaje.
        $this->cantidadMaxPasajeros = $cantMaxP;
        $this->colcPasajeros = $colcP;//El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
        
    }

    public function getCodigoViaje() {
        return $this->codigoViaje;
    }
    public function setCodigoViaje($codVia) {
        $this->codigoViaje = $codVia;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function setDestino($dest) {
        $this->destino = $dest;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    public function setCostoViaje($costo){
        $this->costoViaje = $costo;
    }
    public function getResponsable(){
        return $this->objResponsable;
    }
    public function setResponsable($resp){
        $this->objResponsable = $resp;
    }
    public function getCantidadMaxPasajeros() {
        return $this->cantidadMaxPasajeros;
    }
    public function setCantidadMaxPasajeros($cantMaxP) {
        $this->cantidadMaxPasajeros = $cantMaxP;
    }
    public function getColcPasajeros() {
        return $this->colcPasajeros;
    }
    public function setColcPasajeros($colcP) {
        $this->colcPasajeros = $colcP;
    }
    public function retornaPasajeros(){
        $cad = "";
        for ($i=0;$i>count($this->getColcPasajeros());$i++){
            $cad .= "Pasajero ".($i+1).": \n".$this->getColcPasajeros()[$i];
        }
        return $cad;
    }
    public function __toString(){
        return "Codigo de viaje: ".$this->getCodigoViaje()."\nDestino: ".$this->getDestino()."\nCosto del Viaje:".$this->getCostoViaje().
        "\nResponsable: ".$this->getResponsable()."\nCantidad maxima de pasajeros: ".$this->getCantidadMaxPasajeros()."\nPasajeros: ".$this->retornaPasajeros();
    }
    public function pasajeroExistente($objPasajero){
        $encontrado = false;
        $i = 0;
        if (count($this->getColcPasajeros())>0){
            do{
                if($this->getColcPasajeros()[$i]==$objPasajero){
                    $encontrado = true;
                }
            }while($i<count($this->getColcPasajeros())&&$encontrado == false);
        }
        return $encontrado; 
    }
    public function agregarPasajero($objPasajero){
        if($this->pasajeroExistente($objPasajero)==false){
            $colecPasajeros = $this->getColcPasajeros();
            $i= count($this->getColcPasajeros());
            $colecPasajeros[$i] = $objPasajero;
            $this->setColcPasajeros($colecPasajeros);
        }
    }
    public function cambiarResponsable($objResponsable){
        $respuesta = $this->getResponsable() != $objResponsable;
        if ($respuesta){
            $this->setResponsable($objResponsable);
        }
        return $respuesta;
    }
    public function hayPasajesDisponible(){
        if( $this->getColcPasajeros()<$this->getCantidadMaxPasajeros()){
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        return $respuesta;
    }
    public function venderPasaje($objPasajero){
        $precioFinal = -1;
        if($this->hayPasajesDisponible()){
            $porcentaje = $objPasajero->darPorcentajeIncremento();
            $precioFinal = $this->getCostoViaje()+(($this->getCostoViaje()*$porcentaje)/100);
            $this->agregarPasajero($objPasajero);
        }
        return $precioFinal;
    }
}
