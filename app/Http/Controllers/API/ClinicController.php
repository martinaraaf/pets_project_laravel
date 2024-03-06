<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Http\Resources\ClinicResource;

class ClinicController extends Controller
{
    //
    public function index()
    {
        $clinics = Clinic::all();
        // return response()->json($clinics);
        // return new ClinicResource($clinics);
        // $x = ClinicResource::collection($clinics);
        return ClinicResource::collection($clinics);
    }

    public function search(Request $request)
    {
        $query = Clinic::query();

        if ($request->has('place_area')) {
            $query->where('place_area', 'like', '%' . $request->place_area . '%');
        }

        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->has('rate')) {
            $query->where('rate', '>=', $request->rate);
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $clinics = $query->get();

        // return response()->json($clinics);
        // return $clinics;
        return ClinicResource::collection($clinics);
    }

    public function show(Clinic $id)
    {
        // return response()->json($id);
        // return $id;
        return new ClinicResource($id);

    }
}
