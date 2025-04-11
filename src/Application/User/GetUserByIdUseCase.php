<?php
namespace App\Application\User;

use App\Entity\User;
use App\Repository\UserRepository;


class GetUserById
{
    public function __construct(private UserRepository $userRepository) {}

    public function execute(int $id): ?User
    {
        return $this->userRepository->find($id);
    }
}
