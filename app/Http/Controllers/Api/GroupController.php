<?php

namespace App\Http\Controllers\Api;

use App\UseCases\GroupService;
use App\Http\Requests\Group\CreateRequest;
use App\Http\Controllers\Controller;
use App\Entities\Group;
use Illuminate\Http\Response;
use App\Http\Requests\Group\UpdateRequest;

class GroupController extends Controller
{
    private $service;

    public function __construct(GroupService $service)
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
        return Group::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        $this->service->create($request);

        return response()->json(['Create' => 'success'], Response::HTTP_CREATED);
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

}
