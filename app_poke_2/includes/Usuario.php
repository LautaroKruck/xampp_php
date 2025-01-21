<?php
// Clase Usuario
class Usuario implements JsonSerializable {
    private $id;
    private $nombre;
    private $email;
    private $password;

    public function __construct(string $id, string $nombre, string $email, string $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function saludar(): void {
        echo "Hola, mi nombre es " . $this->nombre;
    }

    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'nombre'=> $this->nombre,
            'email'=> $this->email,
            'password'=> $this->password
        ];
    }
}
?>