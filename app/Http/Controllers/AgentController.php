<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Helpers\APIHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $process = 'create_agent';

        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'age' => 'required|integer|between:1,255',
                'gender' => 'required|in:MALE,FEMALE',
                'address' => 'nullable|string',
                'nationality' => 'nullable|string',
                'passport_id' => 'nullable|string|unique:agents,passport_id',
                'notes' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], APIHelper::INVALID_DATA);
            }

            $agent = new Agent();

            $agent->first_name = $request->first_name;
            $agent->last_name = $request->last_name;
            $agent->age = $request->age;
            $agent->gender = $request->gender;
            $agent->address = $request->address;
            $agent->nationality = $request->nationality;
            $agent->passport_id = $request->passport_id;
            $agent->notes = $request->notes;

            $agent->save();

            return APIHelper::makeAPIResponse(
                'Agent created successfully',
                APIHelper::HTTP_CODE_SUCCESS,
                $process,
                $agent
            );
        } catch(\Exception $ex){
            return APIHelper::makeAPIResponse(
                'Server Error: '.$ex->getMessage(),
                APIHelper::HTTP_CODE_SERVER_ERROR,
                $process,
                null
            );
        }

    }
}
