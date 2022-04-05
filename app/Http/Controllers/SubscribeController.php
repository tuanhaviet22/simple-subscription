<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Subscribe;
use App\User;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscribeRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function store(SubscribeRequest $request)
    {
        $website_id = $request->get('website_id');
        $user_id = $request->get('user_id');

        if (Subscribe::doSubsrcibe($user_id, $website_id)){
            return response()->json([
                'status' => true,
                'message' => "User was subscribed!"
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'message' => "User was subscribed this website!"
        ], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
