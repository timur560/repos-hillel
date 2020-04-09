<?php


namespace App\Service;


use App\Model\User\UserInterface;
use App\Repository\User\UserRepositoryInterface;

final class FindUserService
{
    private UserRepositoryInterface $repository;

    /**
     * FindUserService constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): UserInterface
    {
        return $this->repository->find($id);
    }
}