<?php


namespace App\Repository\User;


use App\Model\User\{User, UserInterface};

final class PdoUserRepository implements UserRepositoryInterface
{
    private \PDO $pdo;

    /**
     * PdoUserRepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(int $id): UserInterface
    {
        $sql = 'select * from `users` where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return new User($data['id'], $data['email']);
    }
}