<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    
	/**
	 * @return mixed
	 */
	public function getAllUsers() {
        return User::all();
	}

    
	/**
	 * @param mixed $userId
	 * @param array $newDetails
	 * @return mixed
	 */
	public function updateUser($userId, array $newDetails) {
        $user = User::findOrFail($userId);
        $user->update($newDetails);
        return $user;
	}
	/**
	 * @param array $userDetail
	 * @return mixed
	 */
	public function createUser(array $userDetail) {
        return User::create($userDetail);
	}
	/**
	 * @param mixed $userId
	 * @return mixed
	 */
	public function getUserAndTask($userId) {
        return User::with('tasks')
                ->where('id', $userId)
                ->first();
	}
}
