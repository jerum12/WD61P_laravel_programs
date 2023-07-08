<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Http\Resources\VehiclesResources;
class VehiclesController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Vehicles = Vehicles::all();
        $response = [
            'code' => 200, 
            'message' => 'Successfully retrieval of Vehicles!', 
            'Vehicles' => VehiclesResources::collection($Vehicles)
        ];
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $service = Vehicles::create($input);
        $response = [
            'code' => 200, 
            'message' => 'Vehicles successfully created!', 
            'service' => new VehiclesResources($service)
        ];
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $service = Vehicles::findOrFail($id);
        $response = [
            'code' => 200, 
            'message' => 'Service successfully created!', 
            'service' => new VehiclesResources($service)
        ];
        return $response;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->all();
        $service = Vehicles::findOrFail($id);
        $service->update($input);
        $response = [
            'code' => 200, 
            'message' => 'Service successfully updated!', 
            'service' => new VehiclesResources($service)
        ];
        return $response;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $service = Vehicles::findOrFail($id);
        $service->delete();
        $response = [
            'code' => 200, 
            'message' => 'Service successfully deleted!', 
            'service' => new VehiclesResources($service)
        ];
        return $response;
    }
}
