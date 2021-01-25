<?php


class User
{
    private string $email;
    private string $password;
    private string $name;
    private string $firstname;
    private string $lastname;
    private int $id;
    private string $role;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $firstname,
        string $lastname,
        int $id,
        string $role = "user"
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->id = $id;
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

}