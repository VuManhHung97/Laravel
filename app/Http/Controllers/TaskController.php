<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    /**
     * @param $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::where('uuid', $request->uuid)->first();

        $taskQuery = Task::query()->where('assignee', $user->id);

        // Task::search(request('keyword'))->get();

        if ($request->has('keyword')) {
            $taskQuery->where('title', 'like', '%'.$request->keyword.'%')
                    ->orWhere('description', 'like', '%'.$request->keyword.'%');    
        }

        if ($request->has('type')) {
            $taskQuery->where('type', 'like', '%'.$request->type.'%');
        }

        if ($request->has('status')) {
            $taskQuery->where('status', 'like', '%'.$request->status.'%');
        }

        return response() -> json([
            'data' => TaskResource::collection($taskQuery->get())->response()->getData(true) 
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
