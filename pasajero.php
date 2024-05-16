<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;
    
    public function __construct($nom,$apel,$numDoc,$telf,$nroAsie,$nroTick){
        $this->nombre = $nom;
        $this->apellido = $apel;
        $this->numeroDocumento = $numDoc;
        $this->telefono = $telf;
        $this->nroAsiento = $nroAsie;
        $this->nroTicket = $nroTick;
    }
    public function getNombre(){
        return $this->nombre;
    } 
    public function setNombre($nom){
        $this->nombre = $nom;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function setApellido($apel) {
        $this->apellido = $apel;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
    public function setNumeroDocumento($numDoc) {
        $this->numeroDocumento = $numDoc;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telf){
        $this->telefono = $telf;
    }
    public function getNroAsiento(){
        return $this->nroAsiento;
    }
    public function setNroAsiento($nroAsie){
        $this->nroAsiento = $nroAsie;
    }
    public function getNroTicket(){
        return $this->nroTicket;
    }
    public function setNroTicket($nroTick){
        $this->nroTicket = $nroTick;
    }
    public function __toString(){
        return "Nombre y Apellido: ".$this->getNombre()." ".$this->getApellido()."\nDNI: ".$this->getNumeroDocumento()."\nTelefono: ".$this->getTelefono().
            "\nNumero de Asiento: ".$this->getNroAsiento()."\nNunmero de Ticket: ".$this->getNroTicket();
    }
    public function darPorcentajeIncremento(){
        $porcentaje = 10;
        return $porcentaje;
    }
}