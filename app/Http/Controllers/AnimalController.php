<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Models\Animal;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string|max:25',
        'age' => 'required|integer',
        'animel_type' => 'required|string',
        'location' => 'required|string',
        'disc' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    if (auth()->check()) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $customFolder = 'animals_images';

        $image->move(public_path($customFolder), $imageName);

        $newFilePath = "{$customFolder}/{$imageName}";
        
        $animal = Animal::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'animel_type' => $request->input('animel_type'),
            'gender' => $request->input('gender'),
            'disc' => $request->input('disc'),
            'location' => $request->input('location'),
            'image' => $newFilePath,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(['animal' => $animal, 'message' => 'Animal created successfully']);
    } else {
        return response()->json(['error' => 'User not authenticated'], 401);
    }

    // $image = $request->file('image');
    // $imageName = time() . '.' . $image->getClientOriginalExtension();

    // $customFolder = 'animals_images';

    // $image->move(public_path($customFolder), $imageName);

    // $newFilePath = "{$customFolder}/{$imageName}";

    // $animal = Animal::create([
    //     'name' => $request->input('name'),
    //     'age' => $request->input('age'),
    //     'animel_type' => $request->input('animel_type'),
    //     'gender' => $request->input('gender'),
    //     'disc' => $request->input('disc'),
    //     'location' => $request->input('location'),
    //     'image' => $newFilePath,
    //     'user_id' => auth()->user()->id,
    // ]);

    // return response()->json(['animal' => $animal, 'message' => 'Animal created successfully']);
    

    
}

    public function All_animals()
    {
        $animals = Animal::all();
        
        return response()->json(['animals' => $animals]);

    }

    public function user_animals()
{
    $userAnimals = auth()->user()->animals;
    return response()->json(['animals' => $userAnimals]);
}

    public function getAnimalById($id)
    {
        try {
            $animal = Animal::findOrFail($id);
            return response()->json(['animal' => $animal]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Animal not found'], 404);
        }
    }

    public function By_Name(Request $request, $animel_type = null)
    {
        $query = Animal::query();

        if ($animel_type) {
            $query->where('animel_type', $animel_type);
        }

        $animals = $query->get();

        return response()->json(['animals' => $animals]);
    }
    public function update(Request $request, $id)
    {
        $animal = auth()->user()->animals()->findOrFail($id);
        $request->validate([
            'name'=>'nullable|string|max:25',
        'age'=>'required|integer|max:25',
        'animel_type'=>'required|string',
        'gender'=>'required|string',
        'location'=>'required|string',
        'disc'=>'nullable|text',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('animal_images', 'public');

        $animal = Animal::update([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'animel_type' => $request->input('animel_type'),
            'gender' => $request->input('gender'),
            'disc' => $request->input('disc'),
            'location' => $request->input('location'),
            'image' => $imagePath,
        ]);


        return response()->json(['animal' => $animal, 'message' => 'Animal updated successfully']);
    }

    public function destroy($id)
    {  $animal = auth()->user()->animals()->findOrFail($id);
        $animal->delete();
        return response()->json(['message' => 'Animal deleted successfully']);
    }
}
