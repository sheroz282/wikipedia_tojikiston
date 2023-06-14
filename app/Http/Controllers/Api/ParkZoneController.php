<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ParkZone;
use Illuminate\Http\Request;

class ParkZoneController extends Controller
{
    public function index()
    {
        $park_zones = ParkZone::all();
        return response()->json($park_zones); 
    }

    public function store(Request $request)
    {
        $park_zone = $this->currobject::create([
            'address' => $request->input('address'),
            'name' => $request->input('name'),
            'work_schedule' => $request->input('work_schedule'),
            'tarif' => $request->input('tarif'),
            'invalid' => $request->input('invalid'),
            'parking_id' => $request->input('parking_id'),
            'marker1' => $request->input('marker1'),
            'marker2' => $request->input('marker2'),
            'polygon1' => $request->input('polygon1'),
            'polygon2' => $request->input('polygon2'),
            'polygon3' => $request->input('polygon3'),
            'polygon4' => $request->input('polygon4'),
            'created_by' => Auth::id(),
        ]);
        $park_zone->save();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
