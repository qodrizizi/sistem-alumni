<?php

namespace App\Http\Controllers;

use App\Models\AlumniAchievement;
use Illuminate\Http\Request;

class AlumniAchievementController extends Controller
{
    public function index()
    {
        return response()->json(AlumniAchievement::with('alumni')->get());
    }

    public function show($id)
    {
        return response()->json(AlumniAchievement::with('alumni')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = AlumniAchievement::create($request->all());
        return response()->json(['message' => 'Created!', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = AlumniAchievement::findOrFail($id);
        $data->update($request->all());
        return response()->json(['message' => 'Updated!', 'data' => $data]);
    }

    public function destroy($id)
    {
        AlumniAchievement::destroy($id);
        return response()->json(['message' => 'Deleted!']);
    }
}
