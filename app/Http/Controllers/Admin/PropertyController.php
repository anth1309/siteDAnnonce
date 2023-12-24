<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ne pas oublier d aller dans AppServiceProvider pour declarer l utilisation de bootstrapp
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(2),
        ]);
    }


    public function create()
    {
        //creer un bien vide pour recuperer les valeures
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 1,
            'city' => 'Nouméa',
            'postal_code' => 98800,
            'sold' => false,
        ]);
        return view('admin.properties.form', compact('property'));
    }


    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        return to_route('admin.property.index')->with('success', "L'annonce a bien été crée");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', "L'annonce a bien été modifie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', "L'annonce a bien été supprime");
    }
}
