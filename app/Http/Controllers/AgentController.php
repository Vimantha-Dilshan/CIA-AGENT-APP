<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Helpers\APIHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Get All Agents
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $process = 'get_agents';

        try {
            $agents = Agent::paginate(20);

            return APIHelper::makeAPIResponse(
                'Success',
                APIHelper::HTTP_CODE_SUCCESS,
                $process,
                $agents
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

    /**
     * Get Agent Data
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $process = 'get_agent_' . $id;

        try {
            $agent = Agent::find($id);

            if (!$agent) {
                return APIHelper::makeAPIResponse(
                    'Agent not found',
                    APIHelper::HTTP_CODE_NOT_FOUND,
                    $process,
                    null
                );
            }

            return APIHelper::makeAPIResponse(
                'Success',
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

    /**
     * Store New Agent
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Update Agent
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $process = 'update_agent_' . $id;

        try {
            $agent = Agent::find($id);

            if (!$agent) {
                return APIHelper::makeAPIResponse(
                    'Agent not found',
                    APIHelper::HTTP_CODE_NOT_FOUND,
                    $process,
                    null
                );
            }

            $validatedData = $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'age' => 'required|integer|between:1,255',
                'gender' => 'required|in:MALE,FEMALE',
                'address' => 'nullable|string',
                'nationality' => 'nullable|string',
                'passport_id' => 'nullable|string|unique:agents,passport_id',
                'notes' => 'nullable|string',
            ]);

            $agent->update($validatedData);

            return APIHelper::makeAPIResponse(
                'Agent updated successfully',
                APIHelper::HTTP_CODE_SUCCESS,
                $process,
                $validatedData
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

    /**
     * Delete Agent Data
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $process = 'delete_agent_' . $id;

        try {
            $agent = Agent::find($id);

            if (!$agent) {
                return APIHelper::makeAPIResponse(
                    'Agent not found',
                    APIHelper::HTTP_CODE_NOT_FOUND,
                    $process,
                    null
                );
            }

            $agent->delete();

            return APIHelper::makeAPIResponse(
                'Agent deleted successfully',
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
