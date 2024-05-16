<?php
class ResponsableV{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;
    
    public function __construct($numEmpl,$numLic,$nom,$apel){
        $this->numeroEmpleado = $numEmpl;
        $this->numeroLicencia = $numLic;
        $this->nombre = $nom;
        $this->apellido = $apel;
    }
      // Métodos get y set para $empleado
      public function getEmpleado() {
        return $this->numeroEmpleado;
    }
    public function setEmpleado($numEmpl) {
        $this->numeroEmpleado = $numEmpl;
    }
    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }
    public function setNumeroLicencia($numLic) {
        $this->numeroLicencia = $numLic;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nom) {
        $this->nombre = $nom;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function setApellido($apel) {
        $this->apellido = $apel;
    }
    public function __toString(){
        return "Responsable:\nNumero de Empleado: ".$this->getEmpleado()."\nNumero de Licencia: ".$this->getNumeroLicencia()."\nNombre y Apellido".$this->getNombre()." ".$this->getApellido();
    }
   
}