<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    /**
     * @param $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('uuid', ['except' => 'store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();

        $userResource = UserResource::collection($users)->response()->getData(true);

        return response() -> json(
            $userResource
        , Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (!$request->has('uuid')) {
            $request['uuid'] = Uuid::uuid4();
        }

        $dataCreate = $request->all();

        $user = $this->userRepository->createUser($dataCreate);

        return response() -> json([
            'message' => 'create user',
            'data' => $user
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepository->getUserAndTask($id);
                
        $userResource = new UserResource($user);

        return response() -> json([
            'data' => $userResource
        ], Response::HTTP_OK); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $dataUpdate = $request->all();

        $user = $this->userRepository->updateUser($id, $dataUpdate);

        $userResource = new UserResource($user);

        return response() -> json([
            'message' => 'update user',
            'data' => $userResource
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
