<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index()
    {
        return response()->json(JobVacancy::with('user')->get());
    }

    public function show($id)
    {
        return response()->json(JobVacancy::with('user')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = JobVacancy::create($request->all());
        return response()->json(['message' => 'Created!', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = JobVacancy::findOrFail($id);
        $data->update($request->all());
        return response()->json(['message' => 'Updated!', 'data' => $data]);
    }

    public function destroy($id)
    {
        JobVacancy::destroy($id);
        return response()->json(['message' => 'Deleted!']);
    }
}
