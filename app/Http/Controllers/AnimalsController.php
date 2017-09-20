<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals, 200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;
        $animal->animal_name = $request['animal_name'];
        $success=$animal->save();

        if(!$success){
            return response()->json("error saving", 500);
        }
        
        return response()->json("success", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        if(is_null($animal))
        {
             return response()->json("not found",404);
        }
     
        return response()->json($animal,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->animal_name = $request['animal_name'];

        $success = $animal->save();
        if(!$success){
            return response()->json("error updating", 500);
        }
        
        return response()->json("success", 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $success = $animal->delete();
        if(!$success){
            return response()->json("error deleting", 500);
        }
        
        return response()->json("success", 201);
    }
}
