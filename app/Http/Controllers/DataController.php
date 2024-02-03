<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Helpers\APIHelper;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    /**
     * Get Agent Full Data
     * NOTE: Include Bio, Safe House, Location & Weapon data
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $process = 'get_agent_profile_' . $id;

        try{
            $agent = Agent::with('safeHouses', 'locations', 'weapons')->find($id);

            if (!$agent) {
                return APIHelper::makeAPIResponse(
                    'Agent not found',
                    APIHelper::HTTP_CODE_NOT_FOUND,
                    $process,
                    null
                );
            }

            $data = [
                'id' => $agent->id,
                'first_name' => $agent->first_name,
                'last_name' => $agent->last_name,
                'age' => $agent->age,
                'gender' => $agent->gender,
                'address' => $agent->address,
                'nationality' => $agent->nationality,
                'passport_id' => $agent->passport_id,
                'notes' => $agent->notes,
                'safe_houses' => $this->mapSafeHouses($agent),
                'locations' => $this->mapLocations($agent),
                'weapons' => $this->mapWeapons($agent),
            ];

            return APIHelper::makeAPIResponse(
                'Success',
                APIHelper::HTTP_CODE_SUCCESS,
                $process,
                $data
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
     * Get Safe House Data
     *
     * @param object $agent
     *
     * @return array
     */
    private function mapSafeHouses($agent): array
    {
        return $agent->safeHouses->map(function ($safeHouse) {
            return [
                'house_id' => $safeHouse->id,
                'house' => $safeHouse->name,
                'security_level' => $safeHouse->security_level,
                'location_id' => $safeHouse->location_id,
                'established_id' => $safeHouse->established_id,
                'notes' => $safeHouse->notes,
            ];
        })->toArray();
    }

    /**
     * Get Location Data
     *
     * @param object $agent
     *
     * @return array
     */
    private function mapLocations($agent): array
    {
        return $agent->locations->map(function ($location) {
            return [
                'location_id' => $location->id,
                'location' => $location->name,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
            ];
        })->toArray();
    }

    /**
     * Get Weapon Data
     *
     * @param object $agent
     *
     * @return array
     */
    private function mapWeapons($agent): array
    {
        return $agent->weapons->map(function ($weapon) {
            return [
                'weapon' => $weapon->name,
                'bullet_category' => $weapon->bullet_type,
                'manufacturer' => $weapon->manufacturer,
                'purchase_date' => $weapon->purchase_date,
                'history' => $weapon->history,
                'updated_at' => $weapon->updated_at->format('Y-m-d H:i:s'),
            ];
        })->toArray();
    }
}
