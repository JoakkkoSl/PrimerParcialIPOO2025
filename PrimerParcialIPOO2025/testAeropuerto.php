<?php
include_once "persona.php";
include_once "vuelo.php";
include_once "aerolinea.php";
include_once "aeropuerto.php";

//Crear instancias de Aerolineas;
$objAerolinea1 = new Aerolinea (1, "Aerolineas Argentinas");
$objAerolinea2 = new Aerolinea (2, "Aerolineas Patagonicas");

//Crear instancias de Vuelo;
        //creamos instancias de la clase Persona para asignarle dos de los vuelos
$persona1 = new Persona("Joaquin" , "Salinas", "Av Arg 123" , "joaquinsalinasfai@gmail.com" , "2995282828");
$persona2 = new Persona("Jorge" , "Lopez", "Av Arg 321" , "jorgelopezfai@gmail.com" , "2995292929");
$persona3 = new Persona("Andres" , "Sandoval", "Av Arg 134" , "andressandovalfai@gmail.com" , "2995303030");
$persona4 = new Persona("Alejandro" , "Navarro", "Av Arg 543" , "alejandronavarro@gmail.com" , "2995313131");

//creamos las 4 instancias de la clase Vuelo y utilizamos la referencia a los objetos persona
$vuelo1 = new Vuelo(101, 1500 , "16-04-2025", "Neuquen Capital", "08:00", "10:00", 100, 20, $persona1);
$vuelo2 = new Vuelo(102, 1500 , "17-04-2025", "Las Grutas", "07:00", "11:00", 110, 30, $persona2);
$vuelo3 = new Vuelo(201, 1800 , "16-04-2025", "Cordoba Capital", "09:00", "13:00", 90, 40, $persona3);
$vuelo4 = new Vuelo (202, 1600 , "17-04-2025", "Buenos Aires", "06:00", "10:00", 120, 50, $persona4);

//a cada instancia de aerolinea le incorporamos 2 vuelos;
$objAerolinea1 -> incorporarVuelo($vuelo1);
$objAerolinea1 -> incorporarVuelo($vuelo2);

$objAerolinea2 -> incorporarVuelo($vuelo3);
$objAerolinea2 -> incorporarVuelo($vuelo4);

//Invocar y visualizar el resultado del método  ventaAutomatica con cantidad de asientos 3 
//y como destino alguno de los destinos de los vuelos creados.
$vueloAsignado = $objAerolinea1->venderVueloADestino(3, "16-04-2025", "Neuquen Capital");
if ($vueloAsignado != null) {
    echo "El vuelo asignado: " . $vueloAsignado->getNumeroVuelo() . " a " . $vueloAsignado->getDestinoVuelo();
} else {
    echo "No se pudo asignar ningún vuelo.";
}

//Crear instancia de Aeropuerto con la coleccion de aerolineas;
$aeropuerto = new Aeropuerto("Aeropuerto Argentino", "Av. Arg 1234", [$objAerolinea1, $objAerolinea2]);

//invocar y visualizar el resultado del método retornarVuelosXAerolinea con la aerolinea 1;
$promedioRecaudado = $aeropuerto -> promedidoRecaudadoXAerolinea(1);
echo "El promedio recaudado por la Aerolinea 1 es de: " . $promedioRecaudado . "md";
?>