<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Models\Logs;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $per_page = $request->per_page ?? 10;

            $data = Users::with('logs')
                ->paginate($per_page)
                ->get();

            if ($data) {
                return response()->json([
                    "users" => $data
                ]);
            } else {
                return response()->json([
                    "message" => "No data found"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Something went wrong",
                "code" => $th->getCode()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $users_validator = new StoreUsersRequest();
            $request->validate($users_validator->rules());

            $data = $request->all();
            $user = Users::create($data);

            if ($user) {
                return response()->json([
                    "message" => "User created successfully",
                    "user" => $user
                ]);
            } else {
                return response()->json([
                    "message" => "There was an error creating the user",
                    "code" => 500
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Something went wrong",
                "code" => $th->getCode()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
