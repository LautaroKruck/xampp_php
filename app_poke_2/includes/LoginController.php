<?php
require_once "GestionFichero.php";

class LoginController {
    private $gestionFichero;

    public function __construct(string $rutaUsuarios) {
        $this->gestionFichero = new GestionFichero($rutaUsuarios);
    }

    public function login(string $email, string $password): ?Usuario {
        $usuarios = $this->gestionFichero->leerFichero();

        foreach ($usuarios as $usuarioData) {
            if ($usuarioData['email'] === $email && $usuarioData['password'] === $password) {
                return new Usuario(
                    $usuarioData['nombre'],
                    $usuarioData['email'],
                    $usuarioData['password']
                );
            }
        }

        return null;
    }
}
?>
