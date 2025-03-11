<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogsRequest;
use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            
            $user_id = $request->user_id;
            $per_page = $request->per_page ?? 30;

            $logs = Logs::where('user_id', $user_id)
                ->whereNull('deleted_at')
                ->paginate($per_page)
                ->get();
            if ($logs) {
                response()->json([
                    "logs" => $logs
                ]);
            } else {
                response()->json([
                    "message" => "No data found"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Erro ao buscar dados, verifique se o usu rio existe e tente novamente.",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $logs_validator = new StoreLogsRequest();
            $request->validate($logs_validator->rules());

            $data = $request->all();
            $log = Logs::create($data);

            if ($log) {
                return response()->json([
                    "message" => "Log created successfully",
                    "log" => $log
                ]);
            } else {
                return response()->json([
                    "message" => "There was an error creating the log",
                    "code" => 500
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        try {

            $log = Logs::where('id', $id)
                ->whereNull('deleted_at')
                ->first();

            if ($log) {
                return response()->json([
                    "log" => $log
                ]);
            } else {
                return response()->json([
                    "message" => "No data found"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Something went wrong when trying to find the log",
                "code" => $th->getCode()
            ]);
        }
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
