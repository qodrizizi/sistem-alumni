<?php

namespace App\Http\Controllers;

use App\Models\EventMember;
use Illuminate\Http\Request;

class EventMemberController extends Controller
{
    public function index()
    {
        return response()->json(EventMember::with(['event', 'alumni'])->get());
    }

    public function show($id)
    {
        return response()->json(EventMember::with(['event', 'alumni'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = EventMember::create($request->all());
        return response()->json(['message' => 'Created!', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = EventMember::findOrFail($id);
        $data->update($request->all());
        return response()->json(['message' => 'Updated!', 'data' => $data]);
    }

    public function destroy($id)
    {
        EventMember::destroy($id);
        return response()->json(['message' => 'Deleted!']);
    }
}
