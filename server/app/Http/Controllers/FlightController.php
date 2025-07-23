<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function getAll() {
        $flights = Flight::all();
        return response()->json($flights);
    }

    public function getById($id) {
        $flight = Flight::find($id);
        if ($flight) {
            return response()->json($flight);
        } else {
            return response()->json(['message' => 'Flight not found'], 404);
        }
    }

    public function getByName($name) {
        $flights = Flight::where('name', 'like', '%' . $name . '%')->get();
        if ($flights->isEmpty()) {
            return response()->json(['message' => 'No flights found with that name'], 404);
        }
        return response()->json($flights);
    }

    public function create(Request $request) {
        $name = $request->input('name');
        $destination = $request->input('destination');
        Flight::create([
            'name'=>$name,
            'destination'=>$destination,
        ]);
        return true;
    }

    public function update(Request $request, $id) {
        $name = $request->input('name');
        $destination = $request->input('destination');
        $flight = Flight::find($id);
        if ($flight) {
            $flight->name = $name;
            $flight->destination = $destination;
            $flight->save();
            return true;
        } else {
            return false;
        }

    }

    public function delete($id) {
        $flight = Flight::find($id);
        if ($flight) {
            $flight->delete();
            return true;
        } else {
            return false;
        }
    }
}
