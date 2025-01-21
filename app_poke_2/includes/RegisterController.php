<?php
require_once "Usuario.php";
require_once "GestionFichero.php";

class RegistroController {
    private $gestionFichero;

    public function __construct(string $rutaUsuarios) {
        $this->gestionFichero = new GestionFichero($rutaUsuarios);
    }

    public function registrarUsuario(string $name, string $email, string $password): bool {
        $usuarios = $this->gestionFichero->leerFichero();

        // Verificar si el email ya está registrado
        foreach ($usuarios as $usuarioData) {
            if ($usuarioData['email'] === $email) {
                return false;
            }
        }

        // Crear nuevo usuario y agregarlo al archivo
        $nuevoUsuario = new Usuario($name, $email, $password);
        $usuarios[] = $nuevoUsuario->jsonSerialize();

        $this->gestionFichero->escribirFichero($usuarios);

        return true;
    }
}
?>
