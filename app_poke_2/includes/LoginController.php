<?php
require_once 'GestionFichero.php';

class LoginController {
    private $gestionFichero;

    public function __construct(string $rutaUsuarios) {
        $this->gestionFichero = new GestionFichero($rutaUsuarios);
    }

    public function login(string $nombre, string $email, string $password) {
        $users = $this->gestionFichero->leerFichero();

        foreach ($users as $usuarioData) {
            // Verifica que las claves existen antes de acceder a ellas
            if (
                isset($usuarioData['nombre'], $usuarioData['email'], $usuarioData['password']) &&
                $usuarioData['nombre'] === $nombre &&
                $usuarioData['email'] === $email &&
                password_verify($password, $usuarioData['password']) // Verifica la contraseña hasheada
            ) {
                return true; // Login exitoso
            }
        }

        return false; // Credenciales incorrectas
    }
}
