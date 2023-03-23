<?php

namespace App\Interfaces;

interface UserRepositoryInterface 
{
    public function getAllUsers();

    public function updateUser($userId, array $newDetails);

    public function createUser(array $userDetail);

    public function getUserAndTask($userId);

}
