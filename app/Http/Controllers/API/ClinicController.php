<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index()
    {
        $clinics = Clinic::all();
        // return response()->json($clinics);
        return $clinics;
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
        return $clinics;
    }

    public function show(Clinic $id)
    {
        // return response()->json($clinics);
        return $id;
    }
}
