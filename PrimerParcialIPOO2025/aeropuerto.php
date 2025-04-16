<?php
class Aeropuerto{
    //atributos;
    private string $denominacion;
    private string $direccion;
    private array $colAerolineas;

    //metodo constructor que recibe los valores iniciales para los atributos;
    public function __construct($pDenominacion, $pDireccion, $pColAerolineas){
        $this -> denominacion = $pDenominacion;
        $this -> direccion = $pDireccion;
        $this -> colAerolineas = $pColAerolineas;
    }

    //getter´s (observadoras); 
    public function getDenominacion(){
        return $this -> denominacion;
    }
    public function getDireccion(){
        return $this -> direccion;
    }
    public function getColAerolineas(){
        return $this -> colAerolineas;
    }

    //setter´s (modificadoras);
    public function setDenominacion($pDenominacion){
        $this -> denominacion = $pDenominacion;
    }
    public function setDireccion($pDireccion){
        $this -> direccion = $pDireccion;
    }
    public function setColAerolineas($pColAerolineas){
        $this -> colAerolineas = $pColAerolineas;
    }

    //método retornarVuelosAerolinea que recibe por parámetro una aerolínea y
    //retorna todos los vuelos asignados a esa aerolínea.
    public function retornarVuelosAerolinea($unaAerolinea) {
        $vuelos = [];
        foreach ($this->colAerolinas as $aerolinea) {
            if ($aerolinea == $unaAerolinea) {
                $vuelos = $aerolinea->getColeccionVuelos(); 
            }
        }
        return $vuelos;
    }

    //método ventaAutomatica que recibe por parámetro la cantidad de asientos, una fecha y un destino 
    //y el aeropuerto realiza automáticamente la asignación al vuelo. 
    public function ventaAutomatica($cantAsientos, $fecha, $destino) {

        foreach ($this->colAerolineas as $aerolinea) {
            $vueloAsignado = $aerolinea->venderVueloADestino($cantAsientos, $destino, $fecha);
            if ($vueloAsignado != null) {
                return $vueloAsignado;
            }
        }
    }

    //método promedioRecaudadoXAerolinea,  que recibe por parámetro la identificación de una Aerolínea
    //y retorna el promedio de lo recaudado por esa Aerolínea en ese Aeropuerto.
    public function promedioRecaudadoXAerolinea($idAerolinea) {
        $totalRecaudado = 0;
        $cantVuelos = 0;
        foreach ($this->colAerolineas as $aerolinea) {
            if ($aerolinea->getIdentificacion() == $idAerolinea) {
                $vuelos = $aerolinea->getColeccionVuelos();
                for ($i = 0; $i < count($vuelos); $i++) {
                    $totalRecaudado += $vuelo->getImporteVuelo();
                    $cantVuelos++;
                }
            }
        }
        return ($totalRecaudado / $cantVuelos);
    }

    //metodo __toString() que devuelve una cadena de texto con los valores de los atributos;
    public function __toString(){
        return "Denominacion del Aeropuerto: " . $this -> getDenominacion() . "\n" .
            "Direccion del Aeropuerto: " . $this -> getDireccion() . "\n" .
            "Coleccion de Aerolineas: " . $this -> getColAerolineas() . "\n";
    }
}



?>