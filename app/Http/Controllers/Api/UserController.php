<?php

namespace App\Http\Controllers\Api;

use \App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\UserInfoResource;
use App\Http\Resources\User\UsersListResource;
use App\UseCases\UserService;
use Illuminate\Http\Request;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserController extends Controller
{

    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersListResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RegisterRequest $request)
    {
        $this->service->register($request);

        return response()->json(['Registration' => 'success'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserInfoResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $this->service->update($id, $request);
        return response()->json(['Update' => 'success'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['Delete' => 'success'], Response::HTTP_OK);
    }
}
