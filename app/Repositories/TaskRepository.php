<?php

namespace App\Repositories;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface 
{   

	/**
	 * @return mixed
	 */
	public function getAllTask() {
        return Task::all();
	}
}
