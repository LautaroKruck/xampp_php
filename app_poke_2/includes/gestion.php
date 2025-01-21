<?php
// Clase Gestion
class GestionFichero {
    private $ruta_fichero;

    public function __construct($ruta_fichero) {
        $this->ruta_fichero = $ruta_fichero;
    }

    public function leerFichero() {
        if (file_exists($this->ruta_fichero)) {
            $content = file_get_contents($this->ruta_fichero);
            return json_decode($content, true) ?? [];
        }
        return [];
    }

    public function escribirFichero($datos) {
        $datos_json = json_encode($datos, JSON_PRETTY_PRINT);
        file_put_contents($this->ruta_fichero, $datos_json);
    }
}
?>