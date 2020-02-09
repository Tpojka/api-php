<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfileUpdateRequest;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileUpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        try {
            $request->user()->update(['name' => $request->input('name')]);

            $return = response()->json($request->user(), 200);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            $return = response()->json(['error' => true, 'message' => $errorMessage], 422);
        } finally {
            return $return;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        return response()->json(['existing_user' => $request->user(), 'requested_changes' => $request->all()], 200);
    }
}
