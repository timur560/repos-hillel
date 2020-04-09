<?php


namespace App\Model\User;


final class User implements UserInterface
{
    private ?int $id;
    private ?string $email;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $email
     */
    public function __construct(?int $id, ?string $email)
    {
        $this->setId($id);
        $this->setEmail($email);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

}