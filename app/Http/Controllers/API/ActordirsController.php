<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ActorDirector;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActordirsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return ActorDirector::latest()->paginate(25);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        return response()->json(ActorDirector::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        return ActorDirector::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {

        $actordir = ActorDirector::findOrFail($id);
        $actordir->update($request->all());

        return response()->json($actordir, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $test = ActorDirector::destroy($id);

        return response()->json(null, 204);
    }
}
