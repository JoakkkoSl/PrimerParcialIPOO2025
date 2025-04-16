<?php
class Aerolinea{
    //atributos;
    private string $identificacion;
    private string $nombreAerolinea;
    private array $vuelosProgramados;

    //metodo constructor que recibe los valores iniciales para los atributos;
    public function __construct($pIdentificacion, $pNombreAerolinea){
        $this -> identificacion = $pIdentificacion;
        $this -> nombreAerolinea = $pNombreAerolinea;
        $this -> vuelosProgramados = [];
    }
    
    //getter´s (observadoras);
    public function getIdentificacion(){
        return $this -> identificacion;
    }  
    public function getNombreAerolinea(){
        return $this -> nombreAerolinea;
    }
    public function getVuelosProgramados(){
        return $this -> vuelosProgramados;
    }

    //setter´s (modificadoras);
    public function setIdentificacion($pIdentificacion){
        $this -> identificacion = $pIdentificacion;
    }
    public function setNombreAerolinea($pNombreAerolinea){
        $this -> nombreAerolinea = $pNombreAerolinea;
    }
    public function setVuelosProgramados($pVuelosProgramados){
        $this -> vuelosProgramados = $pVuelosProgramados;
    }

    //metodo darVueloADestino que recibe por parámetro un destino junto a una cantidad de asientos libres
    //  y se debe retornar una colección con los vuelos disponibles a ese destino.
    public function darVueloADestino($destino, $cantAsientos) {
        $colVuelos = [];
        $colVuelosAerolinea = $this -> getColeccionVuelos();
        //
        foreach ($colVuelosAerolinea as $ObjVuelo) {
            $destinoVuelo = $ObjVuelo  -> getDestino();
            $cantDisponible = $ObjVuelo -> getCantAsientosDisponibles();
        //
                if ($destinoVuelo == $destino && $cantDisponible >= $cantAsientos) {
                array_push($colVuelos, $ObjVuelo);
                }
        }
    }


    //método incorporarVuelo que recibe como parámetro un vuelo, verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida.
    // el método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario.

    public function incorporarVuelo($nuevoVuelo){
        //
        foreach ($this->vuelosProgramados as $vueloExistente) {
            if (
                $vueloExistente -> getDestinoVuelo() === $nuevoVuelo->getDestinoVuelo() &&
                $vueloExistente -> getFecha() === $nuevoVuelo->getFecha() &&
                $vueloExistente -> getHoraPartida() === $nuevoVuelo->getHoraPartida()
                ){
                    return false;
                }
        
            }
            $this->vuelosProgramados[] = $nuevoVuelo;
            return true;
        }

    //método venderVueloADestino, que recibe por parámetro: la cantidad de asientos, el destino y una fecha.
    //El método realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles y en la fecha deseada;
    public function venderVueloADestino($cantAsientos, $destino, $fecha) {
        foreach ($this->colVuelos as $vuelo) {
            if (
                $vuelo->getDestino() === $destino &&
                $vuelo->getFecha() === $fecha &&
                $vuelo->getCantAsientosDisponibles() >= $cant_asientos 
            ){
                // Intentamos asignar los asientos
                if ($vuelo->asignarAsientosDisponibles($cant_asientos)) {
                    return $vuelo;
                }
            }
        }
        // No se encontró un vuelo que cumpla con las condiciones
        return null;
    }

    //el método montoPromedioRecaudado retorna el importe promedio recaudado por la aerolínea con cada uno de sus vuelos;
    public function montoPromedioRecaudado() {
        $colVuelosAerolinea = $this->getVuelosProgramados();
        $totalRecaudado = 0;
        $cantVuelos = count($colVuelosAerolinea);
        if ($cantVuelos > 0) {
            foreach ($colVuelosAerolinea as $ObjVuelo) {
                $vueloImporte = $ObjVuelo->getImporte(); 
                $asientosVendidos = ($ObjVuelo->getCantAsientosTotales() - $unObjVuelo->getCantAsientosDisponibles());
                $totalRecaudado += $vueloImporte * $asientosVendidos;
            }
            $promedio = ($totalRecaudado / $cantVuelos);
        } else {
            $promedio = 0;
        }
        return $promedio;
    }

    //metodo __toString() que devuelve una cadena de texto con los valores de los atributos;
    public function __toString(){
        return "Identificacion de la Aerolinea: " . $this -> getIdentificacion() . "\n" .
            "Nombre de la Aerolinea: " . $this -> getNombreAerolinea() . "\n" .
            "Vuelos Programados: " . $this -> getVuelosProgramados() . "\n";
    }
    }
?>