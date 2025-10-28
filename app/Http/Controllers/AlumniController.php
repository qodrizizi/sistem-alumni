<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::with(['user', 'jobs', 'education', 'achievements']);

        if ($request->filled('nama_lengkap')) {
            $query->where('nama_lengkap', 'LIKE', '%'.$request->nama_lengkap.'%');
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        if ($request->filled('tahun_lulus')) {
            $query->where('tahun_lulus', $request->tahun_lulus);
        }

        if ($request->filled('tempat_lahir')) {
            $query->where('tempat_lahir', 'LIKE', '%'.$request->tempat_lahir.'%');
        }

        // Filter alumni yang memiliki pekerjaan
        if ($request->filled('punya_pekerjaan') && $request->punya_pekerjaan == 'yes') {
            $query->whereHas('jobs');
        }

        // Filter alumni yang memiliki pendidikan
        if ($request->filled('punya_pendidikan') && $request->punya_pendidikan == 'yes') {
            $query->whereHas('education');
        }

        // Filter alumni yang memiliki prestasi
        if ($request->filled('punya_prestasi') && $request->punya_prestasi == 'yes') {
            $query->whereHas('achievements');
        }

        return response()->json($query->get());
    }


    public function show($id)
    {
        return response()->json(
            Alumni::with(['user', 'jobs', 'education', 'achievements'])
            ->findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $alumni = Alumni::create($request->all());
        return response()->json($alumni, 201);
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->update($request->all());
        return response()->json($alumni, 200);
    }

    public function destroy($id)
    {
        Alumni::destroy($id);
        return response()->json(null, 204);
    }
}
