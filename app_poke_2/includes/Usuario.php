<?php
// Clase Usuario
class Usuario implements JsonSerializable {
    private $name;

    private $email;
    private $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setNombre(string $name): void {
        $this->name = $name;
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
            'nombre'=> $this->name,
            'email'=> $this->email,
            'password'=> $this->password
        ];
    }
}
?>