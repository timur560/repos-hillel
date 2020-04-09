<?php


namespace App\Repository\User;


use App\Model\User\{User, UserInterface};
use MongoDB\Client;

final class MongoUserRepository implements UserRepositoryInterface
{
    private Client $client;

    /**
     * MongoUserRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function find(int $id): UserInterface
    {
        $collection = $this->client->blog->users;
        $data = $collection->findOne(['id' => $id]);
        return new User($data->id, $data->email);
    }
}