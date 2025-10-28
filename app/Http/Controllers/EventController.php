<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::with('members')->get());
    }

    public function show($id)
    {
        return response()->json(Event::with('members')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = Event::create($request->all());
        return response()->json(['message' => 'Created!', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Event::findOrFail($id);
        $data->update($request->all());
        return response()->json(['message' => 'Updated!', 'data' => $data]);
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return response()->json(['message' => 'Deleted!']);
    }
}
