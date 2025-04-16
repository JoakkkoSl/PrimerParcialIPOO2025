<?php 
class Vuelo{
    //atributos;
    private int $numeroVuelo;
    private int $importeVuelo;
    private string $fechaVuelo;
    private string $destinoVuelo;
    private string $horaArribo;
    private string $horaSalida;
    private int $cantAsientosDisp;
    private $personaVuelo;

    //metodo constructor que recibe los valores iniciales para los atributos;
    public function __construct($numero, $importe, $fecha, $destino, $horaDeArribo, $horaDeSalida, $asientosDisp, $personaDelVuelo){
        $this -> numeroVuelo = $numero;
        $this -> importeVuelo = $importe;
        $this -> fechaVuelo = $fecha;
        $this -> destinoVuelo = $destino;
        $this -> horaArribo = $horaDeArribo;
        $this -> horaSalida = $horaDeSalida;
        $this -> cantAsientosDisp = $asientosDisp;
        $this -> personaVuelo = $personaDelVuelo;
    }

    //getter´s (observadoras);
    public function getNumeroVuelo(){
        return $this -> numeroVuelo;
    }
    public function getImporteVuelo(){
        return $this -> importeVuelo;
    }
    public function getFechaVuelo(){
        return $this -> fechaVuelo;
    }
    public function getDestinoVuelo(){
        return $this -> destinoVuelo;
    }
    public function getHoraArribo(){
        return $this -> horaArribo;
    }
    public function getHoraSalida(){
        return $this -> horaSalida;
    }
    public function getCantAsientosDisp(){
        return $this -> cantAsientosDisp;
    }
    public function getPersonaVuelo(){
        return $this -> personaVuelo;
    }

    //setter´s (modificadoras);
    public function setNumeroVuelo($numero){
        $this -> numeroVuelo = $numero;
    }
    public function setImporteVuelo($importe){
        $this -> importeVuelo = $importe;
    }
    public function setFechaVuelo($fecha){
        $this -> fechaVuelo = $fecha;
    }
    public function setDestinoVuelo($destino){
        $this -> destinoVuelo = $destino;
    }
    public function setHoraArribo($horaDeArribo){
        $this -> horaArribo = $horaDeArribo;
    }
    public function setHoraSalida($horaDeSalida){
        $this -> horaSalida = $horaDeSalida;
    }
    public function setCantAsientosDisp($asientosDisp){
        $this -> cantAsientosDisp = $asientosDisp;
    }
    public function setPersonaVuelo($personaDelVuelo){
        $this -> personaVuelo = $personaDelVuelo;
    }

    //metodo asignarAsientosDisponibles que recibe la cantidad de pasajeros y devuelve true si se puede asignar los asientos y false si no se puede;
    public function asignarAsientosDisponibles($cantPasajeros) {
            $respuesta = false;
            $cantDisp = $this->getCantAsientosDisp();
        //
            if ($cant_pasajeros <= $cant_disp) {
                $this->setCantAsientosDisponibles($cant_disp - $cant_pasajeros);
                $respuesta = true;
            }
            return $respuesta;
    }

    //metodo __toString() que devuelve una cadena de texto con los valores de los atributos;
    public function __toString(){
        return "Numero de Vuelo: " . $this -> getNumeroVuelo() . "\n" .
            "Importe de Vuelo: " . $this -> getImporteVuelo() . "\n" .
            "Fecha de Vuelo: " . $this -> getFechaVuelo() . "\n" .
            "Destino de Vuelo: " . $this -> getDestinoVuelo() . "\n" .
            "Hora de Arribo: " . $this -> getHoraArribo() . "\n" .
            "Hora de Salida: " . $this -> getHoraSalida() . "\n" .
            "Cantidad de Asientos Disponibles: " . $this->getCantAsientosDisp() . "\n" .
            "Persona del Vuelo: \n" . $this->getPersonaVuelo() . "\n";
    }
}
?>