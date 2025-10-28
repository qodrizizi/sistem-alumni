<?php

namespace App\Http\Controllers;

use App\Models\AlumniJob;
use Illuminate\Http\Request;

class AlumniJobController extends Controller
{
    public function index()
    {
        return response()->json(AlumniJob::with('alumni')->get());
    }

    public function show($id)
    {
        return response()->json(AlumniJob::with('alumni')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = AlumniJob::create($request->all());
        return response()->json(['message' => 'Created!', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = AlumniJob::findOrFail($id);
        $data->update($request->all());
        return response()->json(['message' => 'Updated!', 'data' => $data]);
    }

    public function destroy($id)
    {
        AlumniJob::destroy($id);
        return response()->json(['message' => 'Deleted!']);
    }
}
