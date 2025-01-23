<?php
require_once 'GestionFichero.php';

class RegisterController {
    private $gestionFichero;

    public function __construct(string $rutaUsuarios) {
        $this->gestionFichero = new GestionFichero($rutaUsuarios);
    }

    public function register(string $nombre, string $email, string $password) {
        $users = $this->gestionFichero->leerFichero();
    
        foreach ($users as $usuarioData) {
            // Verifica que las claves existan antes de acceder a ellas
            if (isset($usuarioData['nombre'], $usuarioData['email'])) {
                if ($usuarioData['nombre'] === $nombre || $usuarioData['email'] === $email) {
                    return false; // Usuario ya registrado
                }
            }
        }
    
        $nuevoUsuario = [
            'nombre' => $nombre,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Contraseña segura
        ];
        array_push($users, $nuevoUsuario);
        $this->gestionFichero->escribirFichero($users);
    
        return true; // Registro exitoso
    }
    
}
?>

