<?php
include "viaje.php";

include_once "pasajero.php";
function menu(){
    echo "\n1-Cargar la informacion del viaje\n2-Modificar Viaje\n3-Ingresar Pasajeros\n4-Modificar Pasajero\n5-Ver los datos\n6-mostrar lista de pasajeros\n7-salir\n";
}
$colecPasajeros = [];
echo "Bienvenidos a VIAJE FELIZ\n";
echo "¿Qué desea hacer?";
do{
    echo menu();
    echo "opcion: ";
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1:
            echo "Ingrese el codigo de Viaje:";
            $codVia = trim(fgets(STDIN));
            echo "Destino:";
            $dest = trim(fgets(STDIN));
            echo "Costo del Viaje:";
            $dest = trim(fgets(STDIN));
            echo "Ingrese el responsable:\n";
            echo "Numero de Empleado: ";
            $numI = trim(fgets(STDIN));
            echo "Numero de Licencia: ";
            $numL= trim(fgets(STDIN));
            echo "Nombre: ";
            $nombr = trim(fgets(STDIN));
            echo "Apellido: ";
            $apel = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($numI,$numL,$nombr,$apel);
            echo "Cantidad Maxima de Pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje = new viaje($codVia,$dest,$costo,$objResponsable,$cantMax,$colecPasajeros);
            break;
        case 2:
            echo "Ingrese el nuevo codigo de Viaje:";
            $codVia = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino:";
            $dest = trim(fgets(STDIN));
            echo "Ingrese el nuevo Costo del Viaje:";
            $dest = trim(fgets(STDIN));
            echo "Ingrese el nuevo responsable:\n";
            echo "Numero de Empleado: ";
            $numI = trim(fgets(STDIN));
            echo "Numero de Licencia: ";
            $numL= trim(fgets(STDIN));
            echo "Nombre: ";
            $nombr = trim(fgets(STDIN));
            echo "Apellido: ";
            $apel = trim(fgets(STDIN));
            $responsable = new ResponsableV($numI,$numL,$nombr,$apel);
            echo "Ingrese la nueva capacidad Maxima de Pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje = new viaje($codVia,$dest,$costo,$responsable,$cantMax,$colecPasajeros);
            break;
        case 3: 
            echo "ingrese los pasajeros:\n";
            $i = count($colecPasajeros);
            if ($i >= $cantMax) {
                echo "Se ha alcanzado la cantidad máxima de pasajeros permitida.\n";
            } else {
                $respuesta="s";
                while($respuesta=="s"&&$i<$cantMax){
                    $i++;
                    echo "Pasajero ".$i."\n";
                    echo "Nombre: ";
                    $nom = trim(fgets(STDIN));
                    echo "Apellido: ";
                    $apel = trim(fgets(STDIN));
                    echo "Numero de Documento: ";
                    $DNI = trim(fgets(STDIN));
                    echo "Telefono: ";
                    $telf = trim(fgets(STDIN));
                    echo "Numero de Asiento:";
                    $nroAsient = trim(fgets(STDIN));
                    echo "Numero de Ticket:";
                    $nroTicket = trim(fgets(STDIN));
                    echo "Ingrese el tipo de Pasajero: \n1-Pasajero Regular\n2-PasajeroVIP\n3-Pasajero Con Necesidades Especiales";
                    $tipo = trim(fgets(STDIN));
                    switch($tipo){
                        case 1:
                            $objPasajero = new pasajero($nom,$apel,$DNI,$telf,$nroAsient,$nroTicket);
                            break;
                        case 2:
                            echo "Numero de viajes Frecuentes: ";
                            $nroViajes = trim(fgets(STDIN));
                            echo "Millas recorridas: ";
                            $millas = trim(fgets(STDIN));
                            $objPasajero = new PasajeroVIP($nom,$apel,$DNI,$telf,$nroAsient,$nroTicket,$nroViajes,$millas);
                            break;
                        case 3:
                            echo "";
                    }
                    $importe = $objViaje->venderPasaje($objPasajero);
                    if($importe != -1){
                        echo "El importe del viajes es de: ".$importe."$";
                    }
                }
            }
            break;
        case 4: 
            echo " Que pasajero desear cambiar:\n";
            $opcionPasajero=trim(fgets(STDIN));
            $opcionPasajero--;
            echo "nuevo nombre: ";
            $nuevoNom=trim(fgets(STDIN));
            echo "nuevo apellido: ";
            $nuveoApellido=trim(fgets(STDIN));
            echo "nuevo Nro.Telefono:";
            $nuevoTelefono=trim(fgets(STDIN));
            $colecPasajeros[$opcionPasajero]->modificar($nuevoNom,$nuveoApellido, $nuevoTelefono);
            break;
        case 5 :
            echo $viaje;
            break;
    }
    echo "-------------------------------------\n";
    
}while($opcion>0 &&$opcion<7);
