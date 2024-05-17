<?php
include "viaje.php";
include "responsable.php";
include_once "pasajero.php";
function menu(){
    echo "1-Cargar la informacion del viaje\n2-Modificar Viaje\n3-Ingresar Pasajeros\n4-Modificar Pasajero\n5-Ver los datos del Viaje\n6-mostrar monto total\n7-salir\n";
}
$codVia = 0;
$dest = "";
$costo = 0;
$objResponsable = "";
$cantMax = 0;
$objPasajero1 = new PasajeroVIP("juan","burgos",23,23,23,23,232,4000);
$objPasajero2 = new Pasajero("lucas","burgos",2442,2332,233,23);
$objPasajero3 = new PasajeroNecesidades("lucas","gonza",244223322,2332,233,23,["silla","asitencias"]);
$colecPasajeros = [$objPasajero1,$objPasajero2,$objPasajero3];
$objViaje = new viaje(1213,"buenos aires",20,$objResponsable,3,$colecPasajeros);

echo "Bienvenidos a VIAJE FELIZ\n";
echo "¿Qué desea hacer?\n";
do{
    echo menu();
    echo "opcion: ";
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1:
            echo "-------------------------------------\n";
            echo "Ingrese el codigo de Viaje:";
            $codVia = trim(fgets(STDIN));
            echo "Destino:";
            $dest = trim(fgets(STDIN));
            echo "Costo del Viaje:";
            $costo = trim(fgets(STDIN));
            echo "-------------------------------------\n";
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
            echo "-------------------------------------\n";
            echo "Cantidad Maxima de Pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje = new viaje($codVia,$dest,$costo,$objResponsable,$cantMax,$colecPasajeros);
            break;
        case 2:
            echo "-------------------------------------\n";
            echo "Ingrese el nuevo codigo de Viaje:";
            $codVia = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino:";
            $dest = trim(fgets(STDIN));
            echo "Ingrese el nuevo Costo del Viaje:";
            $costo = trim(fgets(STDIN));
            echo "-------------------------------------\n";
            echo "Ingrese el nuevo responsable:\n";
            echo "Numero de Empleado: ";
            $numI = trim(fgets(STDIN));
            echo "Numero de Licencia: ";
            $numL= trim(fgets(STDIN));
            echo "Nombre: ";
            $nombr = trim(fgets(STDIN));
            echo "Apellido: ";
            $apel = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($numI,$numL,$nombr,$apel);
            $objViaje->cambiarResponsable($objResponsable);
            echo "-------------------------------------\n";
            echo "Ingrese la nueva capacidad Maxima de Pasajeros:";
            $cantMax = trim(fgets(STDIN));
            $objViaje = new viaje($codVia,$dest,$costo,$objResponsable,$cantMax,$colecPasajeros);
            break;
        case 3: 
            echo "-------------------------------------\n";
            echo "Ingrese a los pasajeros:\n";
            $ingresarMas = $objViaje->hayPasajesDisponible();
            if ($ingresarMas) {
                $respuesta="s";
                while($respuesta=="s" && $ingresarMas==true){ 
                    echo "Nuevo Pasajero\n";
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
                    echo "-------------------------------------\n";
                    echo "Ingrese el tipo de Pasajero: \n1-Pasajero Regular\n2-PasajeroVIP\n3-Pasajero Con Necesidades Especiales\nOpcion:";
                    $tipo = trim(fgets(STDIN));
                    echo "-------------------------------------\n";
                    switch($tipo){
                        case 1:
                            $objPasajero = new Pasajero($nom,$apel,$DNI,$telf,$nroAsient,$nroTicket);
                            break;
                        case 2:
                            echo "Numero de viajes Frecuentes: ";
                            $nroViajes = trim(fgets(STDIN));
                            echo "Millas recorridas: ";
                            $millas = trim(fgets(STDIN));
                            $objPasajero = new PasajeroVIP($nom,$apel,$DNI,$telf,$nroAsient,$nroTicket,$nroViajes,$millas);
                            break;
                        case 3:
                            echo "-------------------------------------\n";
                            echo "ingresar cantidad de servicios especiales:";
                            $cantServiciosE=trim(fgets(STDIN));
                            $serviciosE=[];
                            echo "1-sillas rueda\n";
                            echo "2-asistecia embarque y desembarque\n";
                            echo "3-Alimentos especiales\n";                                 
                            for($i=0; $i<$cantServiciosE; $i++){
                                echo "ingresar nombre de los servicios: ";
                                $serviciosE[$i]=trim(fgets(STDIN));
                            }
                            $objPasajero = new PasajeroNecesidades($nom,$apel,$DNI,$telf,$nroAsient,$nroTicket,$serviciosE);
                            echo "-------------------------------------\n";
                            break;
                    }
                    $importe = $objViaje->venderPasaje($objPasajero);
                    if($importe != 0){
                        echo "El importe del viajes es de: ".$importe."$\n";
                        echo "-------------------------------------\n";
                        $ingresarMas= $objViaje->hayPasajesDisponible();
                        if($ingresarMas){
                            echo "Desea Ingresar otro Pasajero?(s/n)\n";
                            $respuesta = trim(fgets(STDIN));
                            echo "-------------------------------------\n";
                        }else{
                            echo "ya no se pueden ingresar mas pasajeros\n";
                        }
                    }else{
                        echo "no se pudo ingresar, usuario ya ingresado\n";
                        echo "Desea Ingresar otro Pasajero?(s/n)\n";
                        $respuesta = trim(fgets(STDIN));
                    }
                }
            } 
            else {
                echo "No se puede ingresar usuarios, no hay espacio disponible\n";
            }
            break;
        case 4: 
            echo "-------------------------------------\n";
            echo " Que pasajero desear cambiar:\n";
            $opcionPasajero=trim(fgets(STDIN));
            $opcionPasajero--;
            echo "nuevo nombre: ";
            $nuevoNom=trim(fgets(STDIN));
            echo "nuevo apellido: ";
            $nuveoApellido=trim(fgets(STDIN));
            echo "nuevo Nro.Telefono:";
            $nuevoTelefono=trim(fgets(STDIN));
            echo "nuevo Asiento:";
            $nuevoAsiento=trim(fgets(STDIN));
            echo "nuevo Ticket:";
            $nuevoTicket=trim(fgets(STDIN));
            $colecPasajeros[$opcionPasajero]->modificar($nuevoNom,$nuveoApellido, $nuevoTelefono,$nuevoAsiento,$nuevoTicket);
            break;
        case 5 :
            echo "-------------------------------------\n";
            echo $objViaje;
            break;
        case 6:
            echo "-------------------------------------\n";
            echo "Monto total de la venta de todos los boletos: ".$objViaje-> montoTotalPortodosPasajero()."$\n";
    }
    echo "-------------------------------------\n";
    
    }while($opcion!=7);

